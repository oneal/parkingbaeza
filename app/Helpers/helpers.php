<?php
function generateSlug($cadena, $delimiter = '-')
{
    $slug = strtolower(trim(preg_replace('~[^0-9a-z]+~i', $delimiter, html_entity_decode(preg_replace('~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i', '$1', htmlentities($cadena, ENT_QUOTES, 'UTF-8')), ENT_QUOTES, 'UTF-8')), $delimiter));
    return $slug;
}

function getPages()
{
    return \App\Models\Page::where('status', 'ACTIVE')->orderBy('orden', 'ASC')->get();
}

function countPosts()
{
    return \TCG\Voyager\Models\Post::where('status', 'PUBLISHED')->get()->count();
}
