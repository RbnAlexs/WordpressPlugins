<?php

/**
 * @author Ivan Rios
 * @copyright 2014
 */

$sections = array(
            array(
                'id' => 'start',
                'title' => __( 'Inicio', self::slug )
            ),
            array(
                'id' => 'general',
                'title' => __( 'Configuración', self::slug )
            ),
            array(
                'id' => 'permalink',
                'title' => __( 'Permalinks & URLs', self::slug )
            )
        );    
        
        $fields['start'] = 
            array(

                
                array(
                    'name' => 'export_options',
                    'label' => __( 'Export Options', self::slug ),
                    'desc' => __( 'Copy your export code and save it somewhere for later use.', self::slug ),
                    'type' => 'export',
                    'default' => '',
                    'class' =>''
                    
                )
            ); 
                         
        $fields['permalink'] = array(
                    array(
                        'name' => 'new_theme_path',
                        'label' => __( 'New theme path', self::slug ),
                        'desc' => __( 'e.g. "/template"', self::slug ),
                        'type' => 'text',
                        'default' => '',
                        'class' =>'permalink_req'
                        ),
                        
                     array(
                        'name' => 'new_style_name',
                        'label' => __( 'New style name', self::slug ),
                        'desc' => __( 'e.g. "main.css" (Require New theme path)', self::slug ),
                        'type' => 'text',
                        'default' => '',
                        'class' =>'permalink_req'
                        ),
                       
                     array(
                        'name' => 'new_include_path',
                        'label' => __( 'New wp-includes path', self::slug ),
                        'desc' => __( 'e.g. "/lib"', self::slug ),
                        'type' => 'text',
                        'default' => '',
                        'class' =>'permalink_req'
                        )
                     ,
                     array(
                        'name' => 'new_plugin_path',
                        'label' => __( 'New plugin path', self::slug ),
                        'desc' => __( 'e.g. "/modules"', self::slug ),
                        'type' => 'text',
                        'default' => '',
                        'class' =>'permalink_req'
                        ),
                     
                     
                     array(
                        'name' => 'rename_plugins',
                        'label' => __( 'Rename Plugins', self::slug ),
                        'desc' => (is_multisite()) ? __( 'Change plugins folder both in sitewide and main blog) with a codename (Require new plugin path).', self::slug ) : __( 'Change each plugin folder name with a codename (Require new plugin path).', self::slug ),
                        'type' => 'select',
                        'default' => '',
                        'class' =>'permalink_req',
                        'options' => array(
                            '' => __( 'Disable Plugin Rename', self::slug ),
                            'on' => __( 'Only Active Plugins (Quick) *', self::slug ),
                            'all' => __( 'All Plugins', self::slug )
                        )
                        
                       
                        )
                     ,
                     array(
                        'name' => 'new_upload_path',
                        'label' => __( 'New upload path', self::slug ),
                        'desc' => __( 'e.g. "/file". <br>If your theme or your image plugins uses <strong>TimThumb</strong> (check source code) <a href="http://codecanyon.net/item/hide-my-wp-no-one-can-know-you-use-wordpress/4177158/faqs/16224">read here</a>.', self::slug ),
                        'type' => 'text',
                        'default' => '',
                        'class' =>'permalink_req'
                        ) 
                    ,
                    array(
                        'name' => 'replace_comments_post',
                        'label' => __( 'Post Comment', self::slug ),
                        'desc' => __( 'Change "wp_comments_post.php" URL (e.g. "/user_submit" or "/folder/user_submit.php").', self::slug ),
                        'type' => 'text',
                        'default' => '',
                        'class' =>'permalink_req'
                        )
                     ,
                     array(
                        'name' => 'replace_admin_ajax',
                        'label' => __( 'AJAX URL', self::slug ),
                        'desc' => __( 'Change wp-admin/admin_ajax.php URL (e.g. "/ajax" or "ajax.php").', self::slug ),
                        'type' => 'text',
                        'default' => '',
                        'class' =>'permalink_req'
                        )
                        ,
                        
                    array(
                        'name' => 'replace_javascript_path',
                        'label' => __( 'Replace \/ URLs', self::slug ),
                        'desc' => 'Choose if you see Javascript URLs (e.g. \/wp-conetet\/themes)',
                        'type' => 'select',
                        'default' => '1',
                        'class' =>'opener',
                        'options' => array(
                            '0' => __( 'Disable JS URLs', self::slug ),
                            '1' => __( 'Only for theme', self::slug ),
                            '2' => __( 'For theme and plugins', self::slug ),
                            '3' => __( 'For theme, plugins and uploads', self::slug ),
                            )
                        ),
                        
                    array(
                        'name' =>'separator2',
                        'label' =>'',
                        'desc' => '<div style="border-top:1px solid #ccc;"></div><br/>',
                        'type' => 'html',
                        'class'=>'permalink_req'
                        )
                    ,  
                    array(
                        'name' => 'author_enable',
                        'label' => __( 'Author', self::slug ),
                        'desc' => '',
                        'type' => 'select',
                        'default' => '1',
                        'class' =>'opener',
                        'options' => array(
                            '1' => __( 'Enable Authors URL', self::slug ),
                            '0' => __( 'Disable Authors URL', self::slug )
                            )
                        ),
                    array(
                        'name' => 'author_base',
                        'label' => __( 'Author Base', self::slug ),
                        'desc' => __( 'Change "/author/username" (e.g. user, profile, members/editrs/).', self::slug ),
                        'type' => 'text',
                        'default' => '/author',
                        'class' =>' open_by_author_enable_1 permalink_req'
                        ) 
                    ,
                    array(
                        'name' => 'author_query',
                        'label' => __( 'Author Query', self::slug ),
                        'desc' => __( 'Change /?author=1 and /?author_name=username (e.g. u, user, member).', self::slug ),
                        'type' => 'text',
                        'default' => 'author',
                        'class' =>' open_by_author_enable_1'
                        )
                    ,
                    array(
                        'name' => 'author_without_base',
                        'label' => __( 'Author without base', self::slug ),
                        'desc' => __( 'Use username directly and without base (e.g. domain.com/admin) *', self::slug ),
                        'type' => 'checkbox',
                        'default' => '',
                        'class' =>'open_by_author_enable_1 permalink_req'
                        )
                    ,
                    array(
                        'name' => 'feed_enable',
                        'label' => __( 'Feeds', self::slug ),
                        'desc' => '',
                        'type' => 'select',
                        'default' => '1',
                        'class' =>'opener',
                        'options' => array(
                            '1' => __( 'Enable Feeds URL', self::slug ),
                            '0' => __( 'Disable All Feeds URL' , self::slug )
                            )
                        ),
                    array(
                        'name' => 'feed_base',
                        'label' => __( 'Feed Base', self::slug ),
                        'desc' => __( 'Change /feed (e.g. xml, rss, index.xml).', self::slug ),
                        'type' => 'text',
                        'default' => '/feed',
                        'class' =>' open_by_feed_enable_1 permalink_req'
                        ) 
                    ,
                      
                    array(
                        'name' => 'feed_query',
                        'label' => __( 'Feed Query', self::slug ),
                        'desc' => __( 'Change /?feed=rss2 (e.g. xml, rss, sitefeed).', self::slug ),
                        'type' => 'text',
                        'default' => 'feed',
                        'class' =>' open_by_feed_enable_1'
                        )  
                    ,
                     
                     //Habilita el uso de los post, si se desactiva no existe interacción en la página
                     array(
                        'name' => 'post_enable',
                        'label' => __( 'Post', self::slug ),
                        'desc' => '',
                        'type' => 'select',
                        'default' => '1',
                        'class' =>'opener',
                        'options' => array(
                            '1' => __('Enable Posts URL', self::slug ),
                            '0' => __('Disable Posts URL', self::slug )
                            )
                     ),

                     //Toma el control de los permalinks desde el plugin, si se borra esta función repercute en el funcionamiento de la página
                    array(
                        'name' => 'post_base',
                        'label' => __( 'Post Permalink', self::slug ),
                        'desc' => (is_multisite()) ? __( 'Use default WP permalink page to change post permalink.', self::slug) : __( 'Change default WP post permalink. <a href="http://codex.wordpress.org/Using_Permalinks">[Get Tags]</a>.', self::slug ),
                        'type' => (is_multisite()) ? 'custom' : 'text',
                        'default' => get_option('permalink_structure'),
                        'class' =>' open_by_post_enable_1 permalink_req'
                        ) 
                    ,
                    
                    //Habilita las páginas, se se quita dejan de funcionar todas las páginas
                    array(
                        'name' => 'page_enable',
                        'label' => __( 'Page', self::slug ),
                        'desc' => '',
                        'type' => 'select',
                        'default' => '1',
                        'class' =>'opener',
                        'options' => array(
                            '1' => __('Enable Pages URL', self::slug ),
                            '0' => __('Disable Pages URL', self::slug )
                            )
                     ),
                     array(
                         'name' => 'category_enable',
                         'label' => __( 'Category', self::slug ),
                         'desc' => '',
                         'type' => 'select',
                         'default' => '1',
                         'class' =>'opener',
                         'options' => array(
                             '1' => __('Enable Categories URL', self::slug ),
                             '0' => __('Disable Categories URL', self::slug )
                             )
                      ),
                     array(
                         'name' => 'category_base',
                         'label' => __( 'Category Base', self::slug ),
                         'desc' => (is_multisite()) ? __( 'Use default WP permalink page to change category base.', self::slug) : __( 'Change /category/uncategorized. (e.g. topic, all).', self::slug ),
                         'type' => (is_multisite()) ? 'custom' : 'text',
                         'default' => get_option('category_base'),
                         'class' =>' open_by_category_enable_1 permalink_req'
                         ) 
                     ,
                     array(
                         'name' => 'category_query',
                         'label' => __( 'Category Query', self::slug ),
                         'desc' => __( 'Change /?cat=1 or /?category_name=uncategorized (e.g. topic).', self::slug ),
                         'type' => 'text',
                         'default' => 'cat',
                         'class' =>' open_by_category_enable_1'
                         )
                     ,
                     
                     array(
                         'name' => 'tag_enable',
                         'label' => __( 'Tag', self::slug ),
                         'desc' => '',
                         'type' => 'select',
                         'default' => '1',
                         'class' =>'opener',
                         'options' => array(
                             '1' => __('Enable Tags URL', self::slug ),
                             '0' => __('Disable Tags URL', self::slug )
                             )
                      ),
                     array(
                         'name' => 'tag_base',
                         'label' => __( 'Tag Base', self::slug ),
                         'desc' => (is_multisite()) ? __( 'Use default WP permalink page to change tag base.', self::slug) : __( 'Change /tag/tag1 (e.g. keyword, find).', self::slug ),
                         'type' => (is_multisite()) ? 'custom' :'text',
                         'default' => get_option('tag_base'),
                         'class' =>' open_by_tag_enable_1 permalink_req'
                         ) 
                     ,
                     array(
                         'name' => 'tag_query',
                         'label' => __( 'Tag Query', self::slug ),
                         'desc' => __( 'Change /?tag=tag1 (e.g. keyword, find).', self::slug ),
                         'type' => 'text',
                         'default' => 'tag',
                         'class' =>' open_by_tag_enable_1'
                         )
                    
            );
                         
        $fields['general'] = 
                array(
                         array(
                            'name' => 'custom_404',
                            'label' => __( '404 Page Template', self::slug ),
                            'desc' => __( '', self::slug ),
                            'type' => 'radio',
                            'default' => '0',
                            'class' =>'opener',
                            'options' => array(
                                '0' => 'Use default 404 page from theme',
                               
                                )
                            )
                        ,      
                       
                        array(
                            'name' => 'trusted_user_roles',
                            'label' => __( 'Trusted User Roles', self::slug ),
                            'desc' => __( 'Choose trusted user roles. (Administrator are trusted by default)', self::slug ),
                            'type' => 'rolelist',
                            'options' => array(),
                            'class' =>''
                            
                        )  
                        ,
                        array(
                            'name' => 'replace_mode',
                            'label' => __( 'Replace Mode', self::slug ),
                            'desc' => __( 'How should we replace old URLs? (Use Full mode with cache)', self::slug ),
                            'type' => 'select',
                            'default' => 'quick',
                            'class' =>'',
                            'options' => array(
                                'quick' => __('Partial (Quick) *', self::slug),
                                'safe' =>  __('Full Page', self::slug)
                                )   
                            )
                        ,
                        array(
                            'name' => 'hide_wp_login',
                            'label' => __( 'Hide Login Page', self::slug ),
                            'desc' => __( 'Hide wp-login.php. [<b>Important:</b> You need to remember new address to login!]', self::slug ),
                            'type' => 'checkbox',
                            'default' => 'hide_my_wp',
                            'class' =>'opener'
                            )
                        ,
                        array(
                            'name' => 'login_query',
                            'label' => __( 'Login Query', self::slug ),
                            'desc' => __( 'Login parameter for protected login address (default: hide_my_wp) e.g. wp-login.php?hide_my_wp=ADMIN_KEY', self::slug ),
                            'type' => 'text',
                            'default' => self::slug,
                            'class' =>'open_by_hide_wp_login' 
                            )
                        ,
                       
                        array(
                            'name' => 'admin_key',
                            'label' => __( 'Admin Login Key', self::slug ),
                            'desc' => sprintf(__( '<br>Current Login url: %s <a title="New WP Login" href="%s">[Link]</a> (Save changes to update)<br>Need to change login URL to something like /login? Try <a href="http://wordpress.org/extend/plugins/theme-my-login/">Theme My Login</a>', self::slug ), '<b>/wp-login.php?'.$this->opt('login_query').'='.$this->opt('admin_key').'</b>', site_url('wp-login.php?'.$this->opt('login_query').'='.$this->opt('admin_key')) ),
                            'type' => 'text',
                            'default' => '1234',
                            'class' =>'open_by_hide_wp_login'
                            )
                        ,
                        array(
                            'name' => 'hide_wp_admin',
                            'label' => __( 'Hide Admin', self::slug ),
                            'desc' => __( 'Hide wp-admin folder and its files for untrusted users.', self::slug ),
                            'type' => 'checkbox',
                            'default' => '',
                            'class' =>''
                            )
                        ,
                        array(
                            'name'=>'separator',
                            'label' => '',
                            'desc' => '<div style="border-top: 1px solid #ccc;"></div><br/>',
                            'type' => 'html',
                            'class' =>''
                            )
                        ,
                         array(
                            'name' => 'email_from_name',
                            'label' => __( 'Email sender name', self::slug ),
                            'desc' => __( 'e.g. John Smith', self::slug ),
                            'type' => 'text',
                            'default' => '',
                            'class' =>''
                            )
                         ,
                         array(
                            'name' => 'email_from_address',
                            'label' => __( 'Email sender address', self::slug ),
                            'desc' => __( 'e.g. info@domain.com', self::slug ),
                            'type' => 'text',
                            'default' => '',
                            'class' =>''
                            )              
                );
          
                                              
                                              
        $menu=array(
                    'name' => self::slug,
                    'title' => self::title,
                    'icon_path' => '',
                    'role' => '',
                    'template_file' =>'',
                    'display_metabox' => '1',
                    'plugin_file' => self::main_file ,
                    'action_link' => '<b>Settings</b>',
                    'multisite_only' => (is_multisite()) ? true : false
                   );

        
                
        foreach ($fields as $tab=>$field){
            $i=0;
            foreach ($field as $option) {
                if ($this->h->str_contains($option['class'], 'permalink_req') && !get_option('permalink_structure'))
                    unset($fields[$tab][$i]) ;
                $i++;
            }
        } 
        
        $this->s = new PP_Settings_API($fields, $sections, $menu);
    

?>