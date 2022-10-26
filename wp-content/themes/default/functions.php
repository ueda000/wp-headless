<?php
function hide_admin_menu() {
  global $menu;
  unset($menu[2]); // ダッシュボード
  unset($menu[5]); // 投稿
  // unset($menu[10]); // メディア
  unset($menu[20]); // 固定ページ
  unset($menu[25]); // コメント
  unset($menu[60]); // 外観
  // unset($menu[65]); // プラグイン
  // unset($menu[70]); // ユーザー
  // unset($menu[75]); // ツール
  // unset($menu[80]); // 設定
}
add_action('admin_menu', 'hide_admin_menu');

function add_plugin_path($paths) {
  $paths['my_plugin'] = MY_PLUGIN_ROOT . '/lib/field-groups/';
  return $paths;
}
add_filter('acfwpcli_fieldgroup_paths', 'add_plugin_path');
