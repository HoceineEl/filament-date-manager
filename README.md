# Filament Date Manager Documentation

[![Latest Version on Packagist](https://img.shields.io/packagist/v/hoceineel/filament-date-manager.svg?style=flat-square)](https://packagist.org/packages/hoceineel/filament-date-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/hoceineel/filament-date-manager/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/hoceineel/filament-date-manager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/hoceineel/filament-date-manager/fix-php-code-styling.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/hoceineel/filament-date-manager/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/hoceineel/filament-date-manager.svg?style=flat-square)](https://packagist.org/packages/hoceineel/filament-date-manager)

This package provides a stylish and customizable date interval column for FilamentPHP, ideal for displaying date ranges such as event durations, project timelines, or other interval-based data in Filament admin panels.

---

## Features
- Multiple themes (e.g., gradient, timeline dots, compact arrow).
- Customizable start and end date columns.
- Translatable date formats.
- Seamless integration with Filament.

---

## Installation

Install the package using Composer:

```bash
composer require hoceineel/filament-date-manager
```

Filament v3 recommends developers create a [custom theme](https://filamentphp.com/docs/3.x/upgrade#custom-themes) to better support a plugin's additional Tailwind classes. After you have created your custom theme, add Toggle Icon Columns' views to your new theme's tailwind.config.js file usually located in resources/css/filament/admin/tailwind.config.js:

```php
content: [
    ...
    './vendor/hoceineel/filament-date-manager/**/*.php',
],
```


Next, compile your theme:

```bash
npm run build
```

Finally, run the Filament upgrade command:

```bash
php artisan filament:upgrade
```

---

## Basic Usage

Add the `DateIntervalColumn` to your Filament table:

```php
use HoceineEl\FilamentDateManager\Columns\DateIntervalColumn;

DateIntervalColumn::make('date_interval')
```

### Specifying Start and End Date Columns
You can customize the start and end date column names:

```php
DateIntervalColumn::make('date_interval')
    ->startDateColumnName('start_date')
    ->endDateColumnName('end_date');
```

---

## Advanced Customizations

### Themes
Select from a variety of themes to display date intervals:

#### Example:
```php
DateIntervalColumn::make('date_interval')
    ->gradientTimelineDots()
    ->color('primary');
```

Available themes:
- `modernGradient()`
- `compactArrow()`
- `cardStyle()`
- `timelineDots()`
- `gradientTimelineDots()`
- `minimalistBorder()`
- `simpleStack()`
- `inlinePill()`
- `minimalDash()`
- `cleanSeparator()`
- `basicLabel()`

> **Note**: Screenshots for these themes should go here for a visual reference.

---

### Date Format
Change the format of the dates:

```php
DateIntervalColumn::make('date_interval')
    ->dateFormat('d-m-Y');
```

---

### Translations
Enable translations for the date formats:

```php
DateIntervalColumn::make('date_interval')
    ->dateFormat('Y , M d')
    ->translated();
```

---

### Custom Colors
Change the color of the date interval indicator:

```php
DateIntervalColumn::make('date_interval')
    ->color('success');
```

Colors available: `primary`, `success`, `danger`, `info`, `warning`, `secondary`.

---

## Example Implementation

Here is an example of a table with a date interval column:

```php
use Filament\Tables;  
use HoceineEl\FilamentDateManager\Columns\DateIntervalColumn;

Tables::make()
    ->columns([
        DateIntervalColumn::make('event_duration')
            ->startDateColumnName('start_date')
            ->endDateColumnName('end_date')
            ->modernGradient()
            ->color('info'),
    ]);
```

---

## Screenshots
1. **Modern Gradient Theme**:
   ![Modern Gradient Theme Placeholder](#)

2. **Compact Arrow Theme**:
   ![Compact Arrow Theme Placeholder](#)

3. **Card Style Theme**:
   ![Card Style Theme Placeholder](#)

(Replace placeholders with real screenshots.)

---

## Testing

Run the package tests using:

```bash
composer test
```

---
## Developed by

<div align="center">
    <p align="center">
        <a href="https://hoceine.com">
            <img src="https://img.shields.io/badge/Created_by-Hoceine_El_Idrissi-2ea44f?style=for-the-badge&logo=heart" alt="Hoceine El Idrissi - Created by">
        </a>
    </p>
    <p align="center">
        <a href="https://hoceine.com">
            <img src="https://img.shields.io/badge/Website-hoceine.com-blue?style=for-the-badge&logo=google-chrome" alt="Hoceine El Idrissi - Portfolio Website">
        </a>
        <a href="https://github.com/hoceineel">
            <img src="https://img.shields.io/github/followers/hoceineel?label=Follow&style=for-the-badge&logo=github" alt="Hoceine El Idrissi - GitHub">
        </a>
        <a href="https://www.linkedin.com/in/elidrissihoceine?originalSubdomain=ma">
            <img src="https://img.shields.io/badge/LinkedIn-Connect-0077B5?style=for-the-badge&logo=linkedin" alt="Hoceine El Idrissi - LinkedIn">
        </a>
        <a href="https://www.youtube.com/channel/UCiUQAIjSabnUlKyzeGJgyGQ">
            <img src="https://img.shields.io/badge/YouTube-Subscribe-FF0000?style=for-the-badge&logo=youtube" alt="Hoceine El Idrissi - YouTube">
        </a>
    </p>
</div>

---

## More from Hoceine

Paid packages for Filament 4 and 5 by the same author:

<table>
<tr>
<td width="33%" valign="top"><a href="https://filamentcraft.dev?ref=date-manager"><img src="https://raw.githubusercontent.com/hoceineel/filament-date-manager/main/docs/images/more/filamentcraft.jpg" alt="FilamentCraft"></a><br><b><a href="https://filamentcraft.dev?ref=date-manager">FilamentCraft</a></b><br>A visual website builder inside your Filament panel: drag sections onto a live canvas, edit against a preview, publish.</td>
<td width="33%" valign="top"><a href="https://media-library.hoceine.com?ref=date-manager"><img src="https://raw.githubusercontent.com/hoceineel/filament-date-manager/main/docs/images/more/media-library-pro.jpg" alt="Media Library Pro"></a><br><b><a href="https://media-library.hoceine.com?ref=date-manager">Media Library Pro</a></b><br>One shared media library: folders, tags, focal points, chunked uploads, duplicate detection and usage tracking.</td>
<td width="33%" valign="top"><a href="https://scheduler-pro.hoceine.com?ref=date-manager"><img src="https://raw.githubusercontent.com/hoceineel/filament-date-manager/main/docs/images/more/scheduler-pro.jpg" alt="Scheduler Pro"></a><br><b><a href="https://scheduler-pro.hoceine.com?ref=date-manager">Scheduler Pro</a></b><br>Resource timelines, Gantt with dependencies, availability-aware booking, recurring events and Kanban boards.</td>
</tr>
</table>

## Contributing

Feel free to submit issues or pull requests to improve this package. Follow the contribution guidelines [here](https://github.com/hoceineel/filament-date-manager).

---

## License

The Filament Date Manager package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

