<?php echo "<?xml version='1.0' encoding='UTF-8' ?>"; ?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    
@foreach($slug as $slug)
<url>
<loc>http://localhost:8000/slug/{{$slug->slug}}</loc>
<lastmod><?php echo $slug->updated_at->format('d.m.Y'); ?></lastmod>
<changefreq>weekly</changefreq>
<priority>0.8</priority>
</url>
@endforeach

</urlset>
