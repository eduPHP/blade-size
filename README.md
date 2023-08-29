### Why??

By default, when we have for example an icon with `{{ $attributes->merge(['class' => 'w-4 h-4']) }}` and we set a custom class with `<x-icons.x class="w-10 h-10" />` it will output `<svg class="w-4 h-4 w-10 h-10" ...>`
To solve this, we needed to add `!` on the classes to set them as `!important`

With this macro we can add `{{ $attributes->size('w-4 h-4')->merge(...) }}` and the macro will handle the classes 🙌

### Usage

`composer.json` (for now):

```json
"repositories": [
  {
    "type": "path",
    "url": "../packages/s90/blade-size",
    "options": {
      "symlink": false
    }
  }
],
```
or 
```json
"repositories": [
  {
    "type": "vcs",
    "url":  "https://github.com/eduPHP/blade-size.git"
  }
],
```

```bash
composer require s90/blade-size:dev-master
```

**Config:**

```bash
php artisan vendor:publish --tag=blade-size-config
```

Blade file:

```html
<svg  {{ $attributes->size('w-6 h-6')->merge(['class' => 'stroke-current']) }} stroke-width="1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
</svg>
```