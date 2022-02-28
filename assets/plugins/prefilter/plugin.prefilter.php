<?php
if ($modx->event->name == 'OnLoadWebDocument') {
    if (isset($params['vptemplate']) && isset($params['prefiltertv']) && $modx->documentObject['template'] == $params['vptemplate'] && !empty($modx->documentObject[$params['prefiltertv']][1])) {
        $target = $modx->documentObject[$params['prefiltertv']][1];
        $_target = parse_url($target);
        $suffix = $modx->getConfig('friendly_url_suffix');
		$path = trim(str_replace($suffix, '', $_target['path']), '/');
		if ($targetId = $modx->getIdFromAlias($path)) {
            parse_str($_target['query'], $query);
            if (!empty($query)) {
                $_GET = array_merge($_GET, $query);
            }
            $modx->setPlaceholder('_prefilter', $modx->documentObject);
            $modx->sendForward($targetId);
        }
    } else {
        $prefilterPage = $modx->getPlaceholder('_prefilter');
        if (!empty($prefilterPage) && is_array($prefilterPage)) {
            $modx->documentObject = $prefilterPage;
        }
    }
}
