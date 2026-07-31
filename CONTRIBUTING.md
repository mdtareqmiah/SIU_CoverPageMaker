# Contributing

Thank you for considering contributing to the SIU Cover Page Generator project. This guide explains how to contribute, including branch naming, commit style, PR workflow, and coding standards.

## Branch Naming

Use descriptive branch names that reflect the work being done.

Examples:

- `feature/add-pdf-testing`
- `fix/validation-error-handling`
- `docs/update-readme`
- `chore/update-dependencies`

## Commit Style

Follow a simple, consistent commit message format.

Format:

```text
<type>(<scope>): <short description>

<body>
```

Example:

```text
feat(validation): add assignment number rule for Assignment task type
```

Common commit types:

- `feat`: new feature
- `fix`: bug fix
- `docs`: documentation updates
- `style`: formatting and style changes
- `refactor`: code refactoring without behavior change
- `test`: adding or updating tests
- `chore`: maintenance tasks

## Pull Request Workflow

1. Fork the repository and create a feature branch.
2. Make changes in a clean, focused way.
3. Run tests locally before committing.
4. Submit a pull request with a clear description of the change.
5. Use the PR title format: `TYPE: short summary`.
6. Link any related issue or milestone.

## Coding Standards

- Keep application logic and documentation separate.
- Keep Blade views clean and avoid inline scripts or styles.
- Use meaningful variable and method names.
- Follow PSR-12 for PHP syntax.
- Keep text and translation strings clear.
- Avoid unnecessary changes to application behavior.

## Reporting Issues

Report issues by opening a new issue in the repository with:

- a clear summary
- reproduction steps
- expected vs actual behavior
- environment details (PHP version, Laravel version, browser)

## License

By contributing, you agree that your contributions will be licensed under the MIT License.
