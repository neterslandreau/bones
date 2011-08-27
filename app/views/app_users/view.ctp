<?php
/**
 * Copyright 2010, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
//debug($user);
?>
<div class="users view">
<h2><?php  __d('users', 'User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('users', 'Username'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user[$model]['username']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('users', 'Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $user[$model]['created']; ?>
			&nbsp;
		</dd>
		<?php
//debug($user['Detail']);
			if (!empty($user['Detail'])) {
				foreach ($user['Detail']['user'] as $field => $value) {
					echo '<dt>' . $field . '</dt>';
					echo '<dd>' . $value . '</dd>';
					echo '<br>';
				}
			}
		?>
	</dl>
</div>
