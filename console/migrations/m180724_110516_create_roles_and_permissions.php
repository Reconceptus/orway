<?php

use yii\db\Migration;

/**
 * Class m180724_110516_create_roles_and_permissions
 */
class m180724_110516_create_roles_and_permissions extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        // создать разрешения
        $posts = $auth->createPermission('posts');
        $posts->description = 'Edit posts';
        $auth->add($posts);

        $pages = $auth->createPermission('pages');
        $pages->description = 'Edit pages';
        $auth->add($pages);

        $adminPanel = $auth->createPermission('adminPanel');
        $adminPanel->description = 'Access to admin panel';
        $auth->add($adminPanel);

        $users = $auth->createPermission('users');
        $users->description = 'Edit users';
        $auth->add($users);

        // создаем роли
        $user = $auth->createRole('user');
        $user->description = 'User';
        $auth->add($user);

        $manager = $auth->createRole('manager');
        $manager->description = 'Manager';
        $auth->add($manager);

        $admin = $auth->createRole('admin');
        $admin->description = 'Admin';
        $auth->add($admin);

        // делаем наследование
        $auth->addChild($manager, $adminPanel);
        $auth->addChild($manager, $posts);
        $auth->addChild($manager, $pages);
        $auth->addChild($admin, $adminPanel);
        $auth->addChild($admin, $posts);
        $auth->addChild($admin, $pages);
        $auth->addChild($admin, $users);

        // создаем админского пользователя
        $userAdmin = new \common\models\User();
        $userAdmin->setPassword('111111');
        $userAdmin->username = 'admin';
        $userAdmin->email = 'suhov.a.s@yandex.ru';
        $userAdmin->status = \common\models\User::STATUS_ACTIVE;
        $userAdmin->generateAuthKey();
        $userAdmin->save();

        $auth->assign($admin, $userAdmin->getId());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return true;
    }
}
