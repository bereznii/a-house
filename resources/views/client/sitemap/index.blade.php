<?php '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($products as $product)
        <url>
            <loc>{{url("automotive/{$product->id}")}}</loc>
            <lastmod>{{ $product->updated_at->tz('GMT')->toAtomString() }}</lastmod>
            <changefreq>always</changefreq>
            <priority>1.0</priority>
        </url>
    @endforeach
</urlset>
