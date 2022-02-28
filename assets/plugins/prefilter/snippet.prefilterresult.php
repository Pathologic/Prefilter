<?php
$params['makePaginateUrl'] = function ($data, $modx, $DL) {
    $urlParams = $_GET;
    unset($urlParams['q']);
    $id = $DL->getCFGDef('id');
    $key = $id ? $id . '_page' : 'page';
    unset($urlParams[$key]);
    if ($modx->documentIdentifier !== $modx->documentObject['id']) {
        return $modx->makeUrl($modx->documentObject['id'], '', http_build_query($urlParams));
    } else {
        return $modx->makeUrl($modx->documentIdentifier, '', http_build_query($urlParams));
    }
};

return $modx->runSnippet('eFilterResult', $params);
