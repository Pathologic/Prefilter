<?php
if ($modx->documentIdentifier != $modx->documentObject['id']) {
    $params['submitPage'] = $modx->documentIdentifier;
}

return $modx->runSnippet('eFilter', $params);