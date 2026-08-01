# SIU Cover Page Maker

A Laravel-based Assignment & Lab Report Cover Page Generator for Sylhet International University.

A professional and practical academic utility built to streamline assignment and lab report submission formatting for students and faculty.

---

## Features

- Assignment Cover Page Generation
- Lab Report Cover Page Generation
- Instant PDF Export
- Official SIU Format
- Responsive Interface
- Form Validation
- Clean UI
- Print Ready PDF
- Laravel Architecture

---

## Tech Stack

| Technology | Usage |
| --- | --- |
| Laravel | Backend framework |
| PHP | Server-side application logic |
| Bootstrap 5 | Responsive UI styling |
| HTML5 | Structure and markup |
| CSS3 | Presentation and layout |
| JavaScript | Frontend interactions |
| DomPDF | PDF generation |

---

## Installation

Follow the steps below to set up the project locally.

```bash
git clone https://github.com/mdtareqmiah/coverpagemaker.git
cd coverpagemaker
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
php artisan serve
```

Then open the app in your browser at:

```bash
http://127.0.0.1:8000
```

---

## Usage

1. Open the application in the browser.
2. Fill in the required cover page information.
3. Select the assignment or lab report type.
4. Click Generate PDF.
5. Download the generated PDF file.

---

## Project Screenshots

### 🏠 Home Page

![Home Page](screenshots/home-page.png)

---

### 🏠 Home Page (Bottom)

![Home Page Bottom](screenshots/home-page-down.png)

---

### 📝 Cover Page Form

![Cover Page Form](screenshots/cover-page-form.png)

---

### 📝 Cover Page Form (Bottom)

![Cover Page Form Bottom](screenshots/cover-page-form-down.png)

---

### 📄 Generated PDF

![Generated PDF](screenshots/Report.png)

---

## Project Structure

```text
app/
bootstrap/
config/
database/
public/
resources/
routes/
screenshots/
tests/
```

---

## Future Improvements

- Multiple University Support
- Custom Templates
- Student History
- QR Verification
- Admin Dashboard
- Dark Mode

---

## Contributing

Contributions are welcome. If you would like to improve the project, please follow these steps:

1. Fork the repository.
2. Create a feature branch.
3. Make your changes.
4. Submit a pull request with a clear description.

---

## License

MIT License

---

## Author

Md. Tareq Miah

Laravel Backend Developer

GitHub: https://github.com/mdtareqmiah

LinkedIn: https://www.linkedin.com/in/mdtareqmiah
