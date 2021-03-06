<?php

function getRelationsFromIncludeRequest($ignores = [])
{
    $request = app('Illuminate\Http\Request');
    $paramIncludes = config('repository.fractal.params.include', 'include');

    $defaultIgnores = ["permission", "permissions"];

    if ($request->has($paramIncludes)) {
        $include = $request->get($paramIncludes);
        $arrIncludes = explode(",", $include);
        foreach ($arrIncludes as $include) {
            foreach ($defaultIgnores as $ignore) {
                if (strpos($include, $ignore) > 0) {
                    $defaultIgnores[] = $include;
                }
            }
        }

        return array_diff($arrIncludes, array_merge($defaultIgnores, $ignores));
    }

    return [];

}


function _empty($data, $field)
{
    $fields = explode('.', $field);
    foreach ($fields as $f) {
        if (empty($data[$f])) return true;
        $data = $data[$f];
    }

    return false;
}


function getDataByKeys($data, $keys)
{
    return array_filter(
        $data,
        function ($key) use ($keys) {
            return in_array($key, $keys);
        },
        ARRAY_FILTER_USE_KEY
    );
}


function getLocaleRules($keys){
    $res = [];
    foreach ($keys as $key=>$rule){
        $res[$key] = [new \App\Rules\MultiLocaleRule(\App\Enum\Locales::AVAILABLE_LOCALES, $rule)];
    }
    return $res;
}
