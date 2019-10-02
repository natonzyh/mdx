<?php flush();?>
<?php get_header();?>
<?php $mdx_index_img=mdx_get_option('mdx_index_img');$mdx_side_img=mdx_get_option('mdx_side_img');if($mdx_side_img==''){$mdx_side_img=$mdx_index_img;};?>
  <body class="mdui-theme-primary-<?php echo mdx_get_option('mdx_styles');?> mdui-theme-accent-<?php echo mdx_get_option('mdx_styles_act');if(mdx_get_option('mdx_styles_dark')!=='disable'){?> mdui-theme-layout-dark mdx-always-dark<?php } ?>">
  <?php if(mdx_get_option("mdx_night_style")==="true" && mdx_get_option('mdx_styles_dark')=='disable'){?>
    <script><?php
    if(mdx_get_option("mdx_auto_night_style")=="true"){?>
    function time_range(beginTime,endTime){var strb=beginTime.split(":");if(strb.length!=2){return false}var stre=endTime.split(":");if(stre.length!=2){return false}var b=new Date();var e=new Date();var n=new Date();b.setHours(strb[0]);b.setMinutes(strb[1]);e.setHours(stre[0]);e.setMinutes(stre[1]);if(n.getTime()-b.getTime()>0&&n.getTime()-e.getTime()<0){return true}else{return false}}var inrange=false;if(time_range("00:00","05:30")||time_range("22:30","23:59")){inrange=true}if((inrange&&(!sessionStorage.getItem('ns_night-styles')))||sessionStorage.getItem('ns_night-styles')==="true"){document.getElementsByTagName('body')[0].className+=" mdui-theme-layout-dark";document.getElementsByName('theme-color')[0].setAttribute("content","#212121");sessionStorage.setItem('ns_night-styles','true')}else if((!inrange)&&(!sessionStorage.getItem('ns_night-styles'))){sessionStorage.setItem('ns_night-styles','false')}
    <?php }else{?>if(sessionStorage.getItem('ns_night-styles')==="true"){document.getElementsByTagName('body')[0].className+=" mdui-theme-layout-dark";document.getElementsByName('theme-color')[0].setAttribute("content","#212121")}<?php }?></script>
    <?php }?>
    <div class="fullScreen sea-close"></div>
    <div class="mdui-drawer mdui-color-white mdui-drawer-close mdui-drawer-full-height" id="left-drawer">
    <div class="sideImg LazyLoad" data-original="<?php echo $mdx_side_img;?>">
      <?php if(mdx_get_option('mdx_night_style')=='true' && mdx_get_option('mdx_styles_dark')=='disable'){;?>
      <button class="mdui-btn mdui-btn-icon mdui-ripple nightVision mdui-text-color-white mdui-valign mdui-text-center" mdui-tooltip="{content: '<?php _e('切换日间/夜间模式','mdx');?>'}" id="tgns" mdui-drawer-close="{target: '#left-drawer'}"><i class="mdui-icon material-icons">&#xe3a9;</i></button>
      <?php }?>
      <?php if(mdx_get_option('mdx_side_info')=='true'){;?>
      <?php if(mdx_get_option('mdx_side_head')!=''){;?>
      <div class="side-info-head mdui-shadow-3" style="background-image:url(<?php echo mdx_get_option('mdx_side_head');?>"></div>
      <?php }?>
      <div class="side-info-more"><?php echo mdx_get_option('mdx_side_name');?><br><span class="side-info-oth"><?php echo mdx_get_option('mdx_side_more');?></span></div>
      <?php }?>
      </div>
      <nav role="navigation"><?php wp_nav_menu(array('theme_location'=>'mdx_menu','menu'=>'mdx_menu','depth'=>2,'container'=>false,'menu_class'=>'mdui-list','menu_id'=>'mdx_menu'));?></nav>
    </div>
    <header role="banner"><div class="titleBarGobal mdui-appbar-fixed mdui-appbar mdui-shadow-0 <?php if(mdx_get_option('mdx_title_bar')=='true'){;?>mdui-appbar-scroll-hide<?php }?> mdui-text-color-white-text titleBarinAc" id="titleBar">
      <div class="mdui-toolbar mdui-color-theme">
        <button class="mdui-btn mdui-btn-icon" id="menu" mdui-drawer="{target:'#left-drawer',overlay:true<?php if(mdx_get_option('mdx_open_side')=='true'){;?>,swipe:true<?php }?>}"><i class="mdui-icon material-icons">menu</i></button>
        <a href="<?php bloginfo('url');?>" class="mdui-typo-headline"><?php $mdx_logo_way=mdx_get_option('mdx_logo_way');if($mdx_logo_way=="2"){$mdx_logo=mdx_get_option('mdx_logo');if($mdx_logo!=""){echo '<img class="mdx-logo" src="'.$mdx_logo.'">';}else{bloginfo('name');}}elseif($mdx_logo_way=="1"){bloginfo('name');}elseif($mdx_logo_way=="3"){$mdx_logo_text=mdx_get_option('mdx_logo_text');if($mdx_logo_text!=""){echo $mdx_logo_text;}else{bloginfo('name');}}?></a>
        <div class="mdui-toolbar-spacer"></div>
        <button class="mdui-btn mdui-btn-icon seai"><i class="mdui-icon material-icons">&#xe8b6;</i></button>
      </div>
    </div></header>
    <?php get_template_part('searchform')?>
    <div class="theFirstPageSmall mdui-valign mdui-typo mdui-text-color-white-text mdui-color-theme"><h1 class="mdui-center mdui-text-center"><?php single_cat_title('',true);?><br><small><?php if(category_description()!=""){echo category_description();}else{_e('文章归档','mdx');}?></small></h1></div>
    <div class="main-in-other">
      <main class="postList mdui-center" id="postlist">
      <?php
            $style=mdx_get_option('mdx_default_style');
            $post_num=0;
            while(have_posts()):the_post();$post_num++;
              if($post_num == 1){
              get_template_part('template-parts/content-first-'.$style, get_post_format());
              }else{
                get_template_part('template-parts/content-'.$style, get_post_format());
              }
            endwhile;?>
      </main><div class="nextpage mdui-center"><?php next_posts_link(__('加载更多', 'mdx'));?>
      </div>
<?php get_footer();?>