<?php
/**
 * Created by PhpStorm.
 * User: suhov.a.s
 * Date: 24.07.2018
 * Time: 17:30
 */

/**
 * @link      http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license   http://www.yiiframework.com/license/
 */

require __DIR__ . '/../vendor/yiisoft/yii2/BaseYii.php';

/**
 * Yii is a helper class serving common framework functionalities.
 *
 * It extends from [[\yii\BaseYii]] which provides the actual implementation.
 * By writing your own Yii class, you can customize some functionalities of [[\yii\BaseYii]].
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since  2.0
 */
class Yii extends \yii\BaseYii
{
	/**
	 * @param string $category
	 * @param string $message
	 * @param array  $params
	 * @param null   $language
	 * @param bool   $editTag выводить тут же тег для редактирования сообщения
	 *
	 * @see Yii::t()
	 *
	 * @return string
	 */
	public static function t($category, $message, $params = [], $language = null, $editTag = false)
	{
		if (static::$app !== null) {
			return static::$app->getI18n()->translate($category, $message, $params, $language ?: static::$app->language);
		}

		$placeholders = [];
		foreach ((array)$params as $name => $value) {
			$placeholders['{' . $name . '}'] = $value;
		}

		return ($placeholders === []) ? $message : strtr($message, $placeholders);
	}

	/**
	 * @param string $category
	 * @param string $key
	 * @param array $params
	 *
	 * @return string
	 */
	public static function tr($category, $key, $params = [])
	{
		return static::t($category, $key, $params, null, true);
	}
}

spl_autoload_register(['Yii', 'autoload'], true, true);
Yii::$classMap =  require(__DIR__ . '/../vendor/yiisoft/yii2/classes.php');
Yii::$container = new yii\di\Container();
