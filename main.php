<?php

if ($argc <= 0) {
    echo '请带入题目编号运行，如 php main.php 1';

    exit(1);
}

// 导入包
require './PoperInterview.php';

// 题目编号
$question_id = $argv['1'] ?: '0';

try {
    // 题目名称
    $question_name = PoperInterview::$questions[$question_id] ?? '';
    if (empty($question_name) || !method_exists(PoperInterview::class, $question_name)) {
        throw new Exception('题目 ID 无效');
    }

    // 输出题目名称
    echo "Question Name: $question_name\n";

    // 调用方案
    $call = [PoperInterview::class, $question_name];
    if (empty($argv['2'])) {
        $result = call_user_func($call);
    } else {
        printf("input: %s\n", $argv['2']);
        $input = json_decode($argv['2'], true);
        $result = call_user_func($call, $input);
    }

    printf("Result: %s\n", json_encode($result));
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
