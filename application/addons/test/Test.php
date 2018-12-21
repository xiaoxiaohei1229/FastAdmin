<?php
//创建钩子实现类
namespace addons\test;    // 注意命名空间规范

use app\common\library\Menu;
use think\Addons;

/**
 * 插件测试
 */
class Test extends Addons    // 需继承think\addons\Addons类
{
    /**
     * 插件安装方法
     * @return bool
     */
    public function install()
    {
        $menu = [
            [
                'name'   => 'test',
                'title'  => '插件示例',
                'ismenu' => 1,
                'icon'   => 'fa fa-list',
                'remark' => '插件开发示例描述',
            ]
        ];
        Menu::create($menu);
    }

    /**
     * 插件卸载方法
     * @return bool
     */
    public function uninstall()
    {
        Menu::delete('test');
        return true;
    }
    
    /**
     * 插件启用方法
     */
    public function enable()
    {
        Menu::enable('test');
    }

    /**
     * 插件禁用方法
     */
    public function disable()
    {
        Menu::disable('test');
    }

    /**
     * 实现的testhook钩子方法
     * @return mixed
     */
    public function testhook($param)
    {
    // 调用钩子时候的参数信息
        print_r($param);
    // 当前插件的配置信息，配置信息存在当前目录的config.php文件中，见下方
        print_r($this->getConfig());
    // 可以返回模板，模板文件默认读取的为插件目录中的文件。模板名不能为空！
        return $this->fetch('info');
    }
}