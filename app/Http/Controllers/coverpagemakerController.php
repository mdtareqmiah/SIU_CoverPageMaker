<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateCoverPageRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class CoverPageMakerController extends Controller
{
    /**
     * Display the cover page generator form.
     *
     * @return View
     */
    public function index(): View
    {
        return view('form');
    }

    /**
     * Generate a cover page PDF from validated request data.
     *
     * @param GenerateCoverPageRequest $request
     * @return Response|RedirectResponse
     */
    public function generatePDF(GenerateCoverPageRequest $request): Response|RedirectResponse
    {
        $validatedData = $request->validated();

        $validatedData['submission_date'] = $this->formatDate($validatedData['submission_date'] ?? null);
        $validatedData['assigned_date'] = $this->formatDate($validatedData['assigned_date'] ?? null);

        try {
            $pdf = Pdf::loadView('pdf_template', $validatedData);
            $filename = $this->buildPdfFilename($validatedData);

            return $pdf->stream($filename);
        } catch (\Throwable $exception) {
            Log::error('PDF generation failed.', [
                'route' => $request->path(),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'task_type' => $validatedData['task_type'] ?? 'unknown',
                'message' => $exception->getMessage(),
            ]);

            return back()
                ->withErrors(['pdf' => 'Unable to generate the PDF at this time. Please try again.'])
                ->withInput();
        }
    }

    /**
     * Format a nullable date string into the PDF display format.
     *
     * @param string|null $date
     * @return string|null
     */
    private function formatDate(?string $date): ?string
    {
        if (empty($date)) {
            return null;
        }

        return Carbon::parse($date)->format('d-M-Y');
    }

    /**
     * Build a browser-friendly PDF filename from task metadata.
     *
     * @param array $data
     * @return string
     */
    private function buildPdfFilename(array $data): string
    {
        $taskType = trim((string) ($data['task_type'] ?? ''));
        $courseCode = trim((string) ($data['course_code'] ?? ''));
        $courseTitle = trim((string) ($data['course_title'] ?? ''));

        if ($courseCode === '' || $courseTitle === '') {
            return 'SIU_Cover_Page.pdf';
        }

        $prefix = $taskType === 'Lab Report' ? 'Lab_Report' : 'Assignment';
        $safeCode = $this->sanitizeFilenamePart($courseCode);
        $safeTitle = $this->sanitizeFilenamePart($courseTitle);

        if ($safeCode === '' || $safeTitle === '') {
            return 'SIU_Cover_Page.pdf';
        }

        return sprintf('%s_%s_%s.pdf', $prefix, $safeCode, $safeTitle);
    }

    /**
     * Normalize a file path segment for safe browser filenames.
     *
     * @param string $value
     * @return string
     */
    private function sanitizeFilenamePart(string $value): string
    {
        $value = str_replace([' ', '/', '\\', ':', '*', '?', '"', '<', '>', '|'], '_', $value);
        $value = preg_replace('/[^A-Za-z0-9_-]+/', '_', $value) ?? '';
        $value = preg_replace('/_+/', '_', $value);

        return trim($value, '_');
    }
}
