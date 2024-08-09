<?php

/**
 *
 */
class PoperInterview
{
    /**
     * @var array 题目编号实现对照表
     */
    public static $questions = [
        null,
        'calculatePriceRiseDays',
        'nonAdjacentMaxSum',
        'shortestPath',
        'longestPalindrome',
    ];

    /**
     * Question 1
     *
     * Given an integer array of prices, which represents the daily price of apples, return an array result,
     * where result [i]=x indicates that a higher price for the i-th day appears after x days,
     * and if the price does not rise after this day, then x=0.
     *
     * 返回数组成员后第几个比其自身更大
     *
     * @param array $prices @eg 30,58,32,41,35,36,54,44
     * @return array
     */
    public static function calculatePriceRiseDays(array $prices = [30, 58, 32, 41, 35, 36, 54, 44]): array
    {
        // 默认值填充
        $len = count($prices);
        $result = array_fill(0, $len, 0);
        $before = [];

        // 遍历价格
        foreach ($prices as $i => $price) {
            // echo "i = $i, price = $price\n";

            // 比上次价格高才检查
            while (!empty($before) && $prices[end($before)] < $price) {
                $before_i = end($before);

                $result[$before_i] = $i - $before_i;

                array_pop($before);
            }

            // 记录下当前
            $before[] = $i;
        }
        return $result;
    }

    /**
     * Question 2
     *
     * Given an integer array of nums, representing a pile of gold coins,
     * with the constraint that data from two adjacent elements cannot be retrieved consecutively,
     * find the sum of the highest amount that can be retrieved
     *
     * 非相邻最大数总和
     *
     * eg:nums= [1, 2, 3, 1], result= 4，explanation: nums[0] + nums[2] = 4
     *
     * @param array $nums
     * @return int
     */
    public static function nonAdjacentMaxSum(array $nums = [1, 2, 3, 1]): int
    {
        $nums = array_merge([0, 0, 0], $nums);
        $nums_len = count($nums);
        $max_sums = [0, 0, 0]; // array_fill(0, $nums_len, 0);
        $max_sum = 0;

        // 只计算自己和之前最后两个加起来最大的那个
        for ($i = 3; $i < $nums_len; $i++) {
            // echo "$i, $nums[$i]\n";

            // 自己和更之前的两个的和(即不和上一个做计算)
            $max_sums[$i] = max($max_sums[$i - 2] + $nums[$i], $max_sums[$i - 3] + $nums[$i]);

            // 直接统计最大值
            if ($max_sums[$i] > $max_sum) {
                $max_sum = $max_sums[$i];
            }
        }

        return $max_sum;
    }

    /**
     * Question 3
     *
     * Given a m * n grid filled with non-negative numbers,
     * find a path from top left to bottom right,
     * you can only move one grid to the right or down at a time.
     * which minimizes the sum of all numbers along its path.
     *
     * 最短路径规划
     *
     * eg: grid = [
     *      [1, 3, 1],
     *      [1, 5, 1],
     *      [4, 2, 1],
     * ]
     * result: 7, explanation: 1 + 3 + 1 +1 + 1 = 7
     *
     * 优化思路：先走通一条路，然后如果其他路径中途出现比这个大的，就直接放弃
     *
     * @param array $grid
     * @return int
     */
    public static function shortestPath(array $grid = [[1, 3, 1], [1, 5, 1], [4, 2, 1]]): int
    {
        // 肯定少不了两次遍历了吧
        $height = count($grid);
        $width = count($grid['0']);

        // 到每个点的步数
        $steps = array_fill(0, $height, array_fill(0, $width, 0));

        // 最小步数(已知)
        $step_min = $grid[0][0];

        // 先做一个不带优化的，分别计算自己所有路径下的值
        for ($y = 0; $y < $height; $y++) {
            for ($x = 0; $x < $width; $x++) {
                $num = $grid[$y][$x];
                // printf("(%d, %d) = %d\n", $x, $y, $num);

                // 分别计算左边 上边 到自己的距离
                $step = [];
                if ($y > 0) {
                    $step[] = $steps[$y - 1][$x] + $num;
                }

                // 距离左边的距离
                if ($x > 0) {
                    $step[] = $steps[$y][$x - 1] + $num;
                }

                // printf("(%d, %d) = top(%d), left(%d)\n", $x, $y, $step[0] ?? -1, $step[1] ?? -1);

                // 如果上面没有就用左边的
                $steps[$y][$x] = (count($step) > 1) ? min($step['0'], $step['1']) : $step['0'] ?? $num;

                // 保存最小路径
                $step_min = min($step_min + $num, $steps[$y][$x]);
            }
        }

        return $step_min;
    }

    /**
     * Question 4
     *
     * Given a string str, return the longest palindromic substring(reverse order of string=original string, eg: "aba","abba") in str
     *
     * 最长回文字符串
     *
     * eg: str="daabbae", result="abba"
     *
     * @param string $str
     * @return string
     */
    public static function longestPalindrome(string $str = 'daabbae'): string
    {
        // 总长度
        $len = strlen($str);

        // 历史更长
        $history = [];

        // 最大长度
        $max_len = 0;

        // 遍历字符串
        for ($i = 0; $i < $len; $i++) {
            // $char = $str[$i];
            // printf("char(%d): %s\n", $i, $char);

            // 检查该位置两侧是否有回文字
            $find_str_odd = static::longestPalindromeFind($str, $i, $i + 1);
            $find_str_even = static::longestPalindromeFind($str, $i - 1, $i + 1);

            // 取最长的结果
            $odd_len = strlen($find_str_odd);
            $even_len = strlen($find_str_even);

            // 没找到跳过
            if ($odd_len == 0 && $even_len == 0) {
                continue;
            }

            // 谁更大？
            if ($odd_len > $max_len && $odd_len > $even_len) {
                $max_len = $odd_len;
                $history[] = $find_str_odd;

                // printf("find_str_odd(%d): %s\n", $i, $find_str_odd);
            } else if ($even_len > $max_len && $even_len > $odd_len) {
                $max_len = $even_len;
                $history[] = $find_str_even;

                // printf("find_str_even = %s\n", $find_str_even);
            }
        }

        // var_dump($history);

        return end($history);
    }

    /**
     * 根据定位点与偏移，返回找到的字符串
     *
     * @param string $str 被寻找的字符串
     * @param int $left_offset 左偏移
     * @param int $right_offset 右偏移
     * @return string
     */
    private static function longestPalindromeFind(string $str, int $left_offset, int $right_offset): string
    {
        // 左右两边各扩一个
        $left_char = $left_offset <= 0 ? '^' : $str[$left_offset];
        $right_char = $str[$right_offset] ?? '$';

        // printf("\tleft_char(%d): %s, right_char(%d) = %s\n", $left_offset, $left_char, $right_offset, $right_char);

        // 相同则尝试再往外扩一格
        if ($left_char == $right_char) {

            // 下面一定会返回成功的字符串 或空 失败
            $result = self::longestPalindromeFind($str, $left_offset - 1, $right_offset + 1, false);

            // 外扩失败 按当前已有的算
            if (empty($result)) {
                return substr($str, max($left_offset, 0), $right_offset - $left_offset + 1);
            }
        }

        return $result ?? '';
    }
}
