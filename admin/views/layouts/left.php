<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::$app->user->identity->username;?></p>

                <!--a href="#"--><i class="fa fa-circle text-success"></i> Online<!--/a-->
            </div>
        </div>

        <!-- search form -->
        <!--form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
					[
						'label' => '用户管理',
						'icon' => 'user-circle',
						'url' => ['/member/index'],
						'items' => [
                            ['label' => '账户管理', 'icon' => 'user-circle', 'url' => ['/member/index']],
							['label' => '注册新账户', 'icon' => 'user-circle', 'url' => ['/member/add']],
                        ],
					],
					[
						'label' => '主页管理',
						'icon' => 'user-circle',
						'url' => ['/content/index'],
						'items' => [
                            ['label' => 'logo管理', 'icon' => 'user-circle', 'url' => ['/content/logo']],
                            ['label' => 'banner管理', 'icon' => 'user-circle', 'url' => ['/content/banner']],
                            ['label' => '最新动态', 'icon' => 'user-circle', 'url' => ['/content/dt']],
                            ['label' => '产品中心', 'icon' => 'user-circle', 'url' => ['/content/cpzx']],
							//['label' => '公司简介', 'icon' => 'user-circle', 'url' => ['/content/profile']],
                        ],
					],
                    ['label' => '网页底部', 'icon' => 'comment', 'url' => ['/content/foot']],
                    [
						'label' => '产品中心',
						'icon' => 'user-circle',
						'url' => ['/cpzx/index'],
						'items' => [
                            ['label' => '产品分类', 'icon' => 'user-circle', 'url' => ['/cpzx/cpfl']],
                            ['label' => '产品中心', 'icon' => 'user-circle', 'url' => ['/cpzx/index']],
                            ['label' => '添加产品', 'icon' => 'user-circle', 'url' => ['/cpzx/add_index']],
                        ],
                    ],
                    [
						'label' => '骑行装备',
						'icon' => 'user-circle',
						'url' => ['/qxzb/index'],
						'items' => [
                            ['label' => '装备分类', 'icon' => 'user-circle', 'url' => ['/qxzb/cpfl']],
                            ['label' => '装备中心', 'icon' => 'user-circle', 'url' => ['/qxzb/index']],
                            ['label' => '添加装备', 'icon' => 'user-circle', 'url' => ['/qxzb/add_index']],
                        ],
                    ],
                    [
						'label' => '新闻赛事',
						'icon' => 'user-circle',
						'url' => ['/xwss/qydt'],
						'items' => [
                            ['label' => '企业动态', 'icon' => 'user-circle', 'url' => ['/xwss/qydt']],
                            ['label' => '行业新闻', 'icon' => 'user-circle', 'url' => ['/xwss/hyxw']],
							['label' => 'banner', 'icon' => 'user-circle', 'url' => ['/xwss/xwss_img']],
                        ],
                    ],
                    [
						'label' => '经销网络',
						'icon' => 'user-circle',
						'url' => ['/jxwl/index'],
                    ],
                    [
						'label' => '申请信息',
						'icon' => 'user-circle',
						'url' => ['/jxwl/join'],
					],
                    [
						'label' => '了解我们',
						'icon' => 'user-circle',
						'url' => ['/content/index'],
						'items' => [
                            ['label' => '首屏', 'icon' => 'user-circle', 'url' => ['/content/ljwmsp']],
                            ['label' => '品牌故事', 'icon' => 'user-circle', 'url' => ['/content/ppgs']],
                            ['label' => '了解我们', 'icon' => 'user-circle', 'url' => ['/content/ljwm']],
                        ],
					],
					['label' => '文件管理', 'icon' => 'trash', 'url' => ['/trash/index']],
                    /*
                    [
						'label' => '联系方式',
						'icon' => 'user-circle',
						'url' => ['/content/lxfs'],
                    ],
                    */
                    //['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
					//['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    //['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    /*[
                        'label' => 'Some tools',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/
                ],
            ]
        ) ?>

    </section>

</aside>
