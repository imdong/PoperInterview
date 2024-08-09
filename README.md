# 王东 - 9年开发

## Part1: Skill Test

此部分答案可通过执行当前目录下的 `bash ./skill-test.sh` 脚本得到。

`PoperInterview.php` 文件包含具体逻辑实现。

### Question 1

> 给定一个整数价格数组，它表示苹果的每日价格，返回一个数组结果，其中 result[i]=x 表示x天后出现比第i天高的价格
> 如果价格在这一天之后没有上涨，那么 x=0。

计算结果：`1,1,3,1,1,2,1,4,3,1,1,4,2,1,1,7,1,2,1,3,2,1,10,2,1,5,1,2,1,1,2,1,4,1,2,1,11,1,2,1,1,1,5,1,1,1,1,0,1,1,1,0,0,0`

可使用 `php main.php 1 '[30,58,32,41,35,36,54,44]'` 自定义参数验证，参数接受 json 字符串

实现代码请查看 `PoperInterview.php:31` 文件的 `PoperInterview::calculatePriceRiseDays()` 函数

第一版实现使用了两个循环，后根据 GPT 的建议，重新采用单调栈方式实现，但保证没有抄袭 GPT 代码。

### Question 2

> 给定一个整数数组的 nums，代表一堆金币，限制两个相邻元素的数据不能连续检索，找到可以检索的最高金额的总和。

计算结果：1920

可使用 `php main.php 2 '[1,2,3,1]'` 自定义参数验证，参数接受 json 字符串

实现代码请查看 `PoperInterview.php:71` 文件的 `PoperInterview::nonAdjacentMaxSum()` 函数

此题思路与第一题类似。每次计算自己与前两个值的和，并取最大值作为当前位置的总和。


### Question 3

> 给定一个非负数填充的 m*n 网格，找到从左上方到右下方的路径，您一次只能向右或向下移动一个网格，它使路径上所有数字的总和最小化。

计算结果：630

可使用 `php main.php 3 '[[1,3,1],[1,5,1],[4,2,1]]'` 自定义参数验证，参数接受 json 字符串

实现代码请查看 `PoperInterview.php:116` 文件的 `PoperInterview::shortestPath()` 函数

核心思路：每次前进一步，并记录到该点的最小步数并缓存。

> 思路上有更优解，即先走通一条路后再回退尝试其他可能，如到某个节点时最小路径已经大于已知最优解则放弃该路径，理论可以减少一定计算量。

### Question 4

> 给定字符串 str，返回 str 中最长的回文子字符串 (字符串的逆序 = 原始字符串，例如: “aba”，“abba”)

计算结果：mdimf4fmidm

可使用 `php main.php 4 '"daabbae"'` 自定义参数验证，参数接受 json 字符串

实现代码请查看 `PoperInterview.php:171` 文件的 `PoperInterview::longestPalindrome()` 函数

核心思路：逐点穷举检查，每个位置两侧是否符合条件。

最优算法：Manacher 算法。

## Part2: Your Experience

### 经常使用的技术

| 能力水平 | 编程语言                                                  |
|------|-------------------------------------------------------|
| 最精通  | PHP (9年)                                              |
| 熟悉   | JavaScript(9年)、Regex(8年)、Shell(7年)、Go(3年)、Node.js(3年) |
| 会使用  | Lua、C#                                                |

| 问题        | 答案           |
|-----------|--------------|
| 开发经验最多的平台 | Linux Server |
| 最感兴趣的开发平台 | Linux Server |

| 类别                    | 我的经验                     |
|-----------------------|--------------------------|
| Object Containers     | Laravel(5年)、ThinkPHP(3年) |
| MVC                   | 无 (RESTful API + Vue.js) |
| ORM                   | Eloquent                 |
| Testing               | PHPUnit                  |
| IDE/Editor            | PHPStorm、VS Code、vim     |
| UML/Diagram           | draw.io                  |
| SCM                   | Git                      |
| Builds                | 无                        |
| Java Profilers        | 不适用                      |
| Web Applications      | Nginx、OpenResty          |
| Performance Profilers | 无                        |
| Issue Trackers        | 禅道                       |
| Agile Processes       | 无                        |
| Social Coding         | GitHub                   |
| Code Review           | 无                        |

### 你想在 Comiru 实现什么？

我期望参与能为众多人服务的项目，希望在未来某天，当看到仍有人在使用我曾参与的项目时，倍感欣慰，因为这彰显了我的自我价值。

从技术层面讲，每个人总有一些局限性，希望在团队中接触、学习并运用更多以往未接触过的技术，同时通过团队发现自身存在的问题。

### 您对哪种Web或智能手机应用程序感兴趣？

> 请说出至少一个你经常使用的应用程序，以及至少一个你在去年发现的应用程序。

最常使用的:

1. 微信: 如果不用它，我怕朋友认为我消失了 ^_^!!
2. BitWarden: 密码管理工具，可能已经忘记密码，也可能“从未”记住密码。

去年发现的应用:

绝对是 ChatGPT，我现在已经离不开它了。
它是一个很好的朋友、助手和老师，能协助我解决问题，并纠正我的错误。

### 列出 3 种你最近感兴趣的技术，以及你为什么对它们感兴趣。

1. GitHub workflows: 自动构建打包工具，写一些轻度爬虫，用来获取低频更新但容易错过的内容。
2. CSS Flexbox: 前端布局，我的前端布局很差，做一些个人感兴趣的小项目时总会败在这，希望补全短板。
3. Flarum extensions: Flarum 是一个论坛，兴趣小圈子的论坛希望我能帮忙定制开发一些小功能。了解后发现这个框架与 Laravel 底层相同，实现理念理想化，可在不修改核心的情况下扩展实现任何功能，并且扩展功能还能被扩展。

### 到目前为止，您在开发或编程中遇到的技术上最困难或最有趣的事情是什么？

最困难: 一个使用多年的系统，长期使用拷贝系统镜像方式部署，希望改为使用 Gitlab CI/CD 打包软件化安装包，并要求在纯净系统上完全离线安装且单文件。

#### 你为什么觉得它很难/有趣？

依赖包未知，需要找齐这些年陆续安装的包与依赖包，只能在一次次试错中找到缺失的包，
从未接触过 CI/CD 相关知识面，需要一边学习一边遇到问题解决问题。
安装包内涉及多个业务组的不同功能组件，需要合理组织打包与安装流程。
最后的安装文件只能有一个，要运维人员上传执行即可完成安装。

#### 3.你的解决方案是什么，你是如何实现的？

利用 PVE 虚拟机快照，实现纯净操作系统复用，利用 `yum downloadonly` 导出完整依赖包并用 `createrepo` 制作本地源。

使用 CI/CD 时指定执行脚本规则使业务解耦，每个组件在特定入口下实现自己模块的安装配置，最后由一个流水线打包为一个安装包。

每个组件的仓库根据模板实现本仓库的 CI 构建，产生可用安装包，暴露 before_install.sh、install.sh、after_install.sh、check.sh 控制安装过程中不同时间点的行为。最终打包的安装包只需释放文件，并按顺序执行各组件的安装。

至于单文件安装包，最后实现的是提供一个 [sh 自解压脚本](https://www.qs5.org/Post/729.html)，读取附带在 sh 脚本后面的二进制文件列表，实现自动安装 tar、自动解压、自动执行 install.sh。

### 公共存储库url

> (例如: GitHub、Bitbucket 等)

[ImDong(青石) - GitHub - github.com/imdong](https://github.com/imdong/)

### 公共社会账户

> (如适用; 例如: Twitter、Facebook 等)

我的个人博客: [青石坞 qs5.org](https://www.qs5.org/)

### 哪 3 本技术书籍或文章对您产生了重大影响？

一般都是直接阅读官方文档，大部分需要的内容都在文档或使用手册中找到。

《W3School》：早年入门 HTML、ASP、JavaScript、VBScript、PHP、SQL 等的启蒙地。

关于设计模式的几篇文章、手册，对我从面向过程开发转变到面向对象开发的影响还是挺大的，对于封装、继承等以及开发思维模式都有一定影响。

最近在看的文章：

《[An Interactive Guide to Flexbox](https://www.joshwcomeau.com/css/interactive-guide-to-flexbox/)》: 关于 CSS Flex 布局，写得简明直观，示例明确展示各种样式对元素的影响。

> 非常感谢