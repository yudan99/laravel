<?php

function base64ToFile($content)
{
    if (!($content && \Str::contains($content, ['src="data:image', 'src=\'data:image']))) {
        return $content;
    }

    $pattern = '/(data:image\/)([^;]+)(;base64,)([^\"]+)/';
    $res     = preg_replace_callback($pattern, function ($matches) {
        // 生成路径
        $public_path = public_path();
        $folder_path = '/uploads/images/articles/' . date('Ym') . '/' . date('d') . '/';
        if (!is_dir($dir = $public_path . $folder_path)) {
            mkdir($dir, 0777, true);
        }

        // 生成文件名
        $matches[2] = $matches[2] === 'jpeg' ? 'jpg' : $matches[2];
        $filename   = md5(time() . \Illuminate\Support\Str::random()) . '.' . $matches[2];
        $file       = $dir . $filename;

        // 保存文件
        file_put_contents($file, base64_decode($matches[4]));// base64 转图片

        // 返回相对路径
        return $folder_path . $filename;
    }, $content);

    return $res;
}

function unicodeDecode($name){

    $json = '{"str":"'.$name.'"}';
    $arr = json_decode($json,true);
    //if(empty($arr)) return '';
    return $arr['str'];

}
