wordpress前端通用模板使用方法
================

### 前端环境：nodejs + gruntjs（完成less编译 + css压缩 + js压缩）

1. 安装nodejs请参考：<http://howtonode.org/how-to-install-nodejs>
2. 安装gruntjs请参考：<http://www.gruntjs.org/article/getting_started.html>

### 具体安装和使用方法

1. 确保安装完nodejs
2. 可在任意目录下执行：`npm install –g grunt-cli`安装gruntjs
3. 前端环境的目录为：{wordpress根目录}/wp-content/themes/{wordpress主题名}/
4. 在前端环境的目录下执行：`grunt`即可编译less + 压缩编译后的css + 压缩js，如果文件发送变化，也将实时编译

### 目录结构

├── header.php 公共头部
├── footer.php 公共尾部
├── index.php 首页
├── category.php 分类页
├── archive.php 存档页
├── single.php 文章页
├── page.php 静态页
├── ...
├─┬ css
  ├── style.less 样式文件
  ├── comm.less 公共样式
  ├── index.less 首页样式
  ├── category.less 分类页样式
  ├── archive.less 存档页样式
  ├── single.less 文章页样式
  ├── page.less 静态页样式
  ├─┬ ...
    ├── inc
    ├── reset.less 样式初始化文件
    ├── util.less 样式工具库文件
    ├── var.less 样式变量库文件
├── style.less 样式文件
├── style.css 编译压缩后的样式文件
├─┬ img 
  ├── 图片
├─┬ js
  ├── jquery.min.js
  ├── global.js js文件
  ├── global.min.js 压缩后的js文件
├── package.json 依赖库配置文件
├── Gruntfile.js Gruntjs配置文件
