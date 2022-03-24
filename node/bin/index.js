#!/usr/bin/env node
//第一行其中#!/usr/bin/env node表示用node解析器执行本文件。
// +----------------------------------------------------------------------
// | StartPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 Cat Catalpa Vitality All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: company@catcatalpa.com
// +----------------------------------------------------------------------

const program = require('commander')
const pkg = require('./package')
const chalk = require('chalk')
const download = require('download-git-repo');
const ora = require('ora');
const spinner = ora('Loading undead unicorns');

/**
* version
*/
program
.version(chalk.green('StartPHP Package Version : v' + `${pkg.version}`))
.description(chalk.green('StartPHP 一款轻量化、易上手、完善化的PHP框架  https://startphp.catcatalpa.com'));
program
.option('-v, --version', 'Print the startphp package version')
/**
* init 项目
*/
program
.command('init')
.description('generate a project from a remote template (legacy API, requires ./wk-init)')
.option('-c, --clone', 'Use git clone when fetching remote template')
.action((template, appName, cmd) => {
spinner.start('Download Start');
download('direct:git@github.com:catcatalpa/StartPHP', "startphpcode", { clone: true }, err => {
if (err) {
spinner.fail(chalk.green('Download Failed \n' + err));
process.exit();
}
spinner.succeed(chalk.green(`Complate!`));
});
})

program.parse(process.argv)