# Laravel Sprite
Little package that simply offers you the dynamic sprite generation of your svg assets.

### Why?
In case you use two or more SVGs on the page specially if the code amount on them is huge.

### How?
Simply install the composer package\
`composer require ntpages/laravel-sprite`

Create your svg directories with icons in the configured path, default:\
`./resources/svg/**/*.svg`

Use anywhere you want, default route:\
```blade
<svg xmlns="http://www.w3.org/2000/svg">
    <use xlink:href="{{ route('sprite.svg', ['name' => 'directory-name']) }}#icon-name"></use>
</svg>
```
