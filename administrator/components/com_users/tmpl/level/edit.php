<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_users
 *
 * @copyright   (C) 2009 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

/** @var \Joomla\Component\Users\Administrator\View\Level\HtmlView $this */

/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $this->getDocument()->getWebAssetManager();
$wa->useScript('keepalive')
    ->useScript('form.validate');

?>

<form action="<?php echo Route::_('index.php?option=com_users&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="level-form" aria-label="<?php echo Text::_('COM_USERS_LEVEL_FORM_' . ((int) $this->item->id === 0 ? 'NEW' : 'EDIT'), true); ?>" class="form-validate main-card">
    <?php echo HTMLHelper::_('uitab.startTabSet', 'myTab', ['active' => 'details', 'recall' => true, 'breakpoint' => 768]); ?>

        <?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'details', Text::_('COM_USERS_LEVEL_DETAILS')); ?>
            <fieldset class="options-form">
                <legend><?php echo Text::_('COM_USERS_LEVEL_DETAILS'); ?></legend>
                <div class="control-group">
                    <div class="control-label">
                        <?php echo $this->form->getLabel('title'); ?>
                    </div>
                    <div class="controls">
                        <?php echo $this->form->getInput('title'); ?>
                    </div>
                </div>
            </fieldset>
        <?php echo HTMLHelper::_('uitab.endTab'); ?>

        <?php echo HTMLHelper::_('uitab.addTab', 'myTab', 'groups', Text::_('COM_USERS_USER_GROUPS_HAVING_ACCESS')); ?>
            <fieldset class="options-form">
                <legend><?php echo Text::_('COM_USERS_USER_GROUPS_HAVING_ACCESS'); ?></legend>
                <div>
                    <?php echo HTMLHelper::_('access.usergroups', 'jform[rules]', $this->item->rules, true); ?>
                </div>
            </fieldset>
        <?php echo HTMLHelper::_('uitab.endTab'); ?>

    <?php echo HTMLHelper::_('uitab.endTabSet'); ?>

    <input type="hidden" name="task" value="">
    <?php echo HTMLHelper::_('form.token'); ?>
</form>
