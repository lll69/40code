<?php
date_default_timezone_set( 'Asia/Shanghai' );
function _addEtag($file) {
    $last_modified_time = filemtime($file);
    $etag = md5_file($file);
    // always send headers
    header("Last-Modified: ".gmdate("D, d M Y H:i:s", $last_modified_time)." GMT");
    header("Etag: $etag");
    // exit if not modified
    if (@strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $last_modified_time ||
        @trim($_SERVER['HTTP_IF_NONE_MATCH']) == $etag) {
        header("HTTP/1.1 304 Not Modified");
        exit;
    }
};
_addEtag(__FILE__)
?>


<!DOCTYPE html>
<html>

<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.x/css/materialdesignicons.min.css" rel="stylesheet"> -->
    <link href="https://cdn.staticfile.org/MaterialDesign-Webfont/6.6.96/css/materialdesignicons.min.css"
        rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://unpkg.com/vuetify-dialog@2.0.17/dist/vuetify-dialog.min.css"> -->
    <link href="https://cdn.staticfile.org/vuetify/2.5.8/vuetify.min.css" rel="stylesheet">
    <link href="https://cdn.staticfile.org/viewerjs/1.10.5/viewer.min.css" rel="stylesheet">


    <link rel="shortcut icon" href="/other/favicon.ico" />
    <link rel="bookmark" href="/other/favicon.ico" />

    <title>40code少儿编程社区</title>
    <meta content="40code,40code少儿编程社区,少儿编程社区,图形化编程社区,编程创作学习,scratch社区" name="keywords" />
    <meta content="40code是一个公益性质的scratch社区，没有太多的规定，拥有3D扩展、云数据扩展、懒加载音乐扩展。用40code，你能轻松做出让人惊叹的3D作品和音游。"
        name="description" />
    <link href="/other/index.css" rel="stylesheet">
    <script src="https://cdn.staticfile.org/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://cdn.staticfile.org/markdown.js/0.5.0/markdown.min.js"></script> -->
    <script charset="UTF-8" id="LA_COLLECT" src="//sdk.51.la/js-sdk-pro.min.js"></script>
    <script src="https://cdn.dingxiang-inc.com/ctu-group/captcha-ui/index.js"></script>
    <script src="https://lib.baomitu.com/dompurify/2.3.6/purify.min.js"></script>
    <script crossorigin="anonymous"
        integrity="sha512-hzyXu3u+VDu/7vpPjRKFp9w33Idx7pWWNazPm+aCMRu26yZXFCby1gn1JxevVv3LDwnSbyKrvLo3JNdi4Qx1ww=="
        src="https://lib.baomitu.com/marked/4.0.2/marked.min.js"></script>
    <script src="https://cdn.staticfile.org/viewerjs/1.10.5/viewer.min.js"></script>
    <script src="https://cdn.gitblock.cn/static/scripts-lib/scratchblocks-v3.4-min.js"></script>
    <script>
        // var normalizedDomain = "www.40code.com";
        // if (window.location.host != "localhost" && window.location.host != normalizedDomain) {
        //     window.location.href = "https://" + normalizedDomain + window.location.pathname + window.location.search + window.location.hash;
        // }
        (() => {
            let time = (new Date());
            let d = [
                [
                    12, 13
                ],
                // [
                //     4, 4
                // ]
            ]
            for (i of d) {
                if (time.getMonth() == i[0] - 1 && time.getDate() == i[1]) {
                    document.write(`
            <style>
              html {
                filter: progid:DXImageTransform.Microsoft.BasicImage(grayscale=1);
                -webkit-filter: grayscale(100%);
              }
            </style>
            `)
                }
            }
        })()

        function getCookie(cname) {

            var name = cname + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i].trim();
                if (c.indexOf(name) == 0) {
                    let d = c.substring(name.length, c.length);
                    if (cname == 'token') {
                        try {
                            v.$data.token = d
                        } catch (error) { }
                    }
                    return d
                }
            }
            return "";
        }
        function IsPC() {
            var userAgentInfo = navigator.userAgent;
            var Agents = new Array("Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod");
            var flag = true;
            for (var v = 0; v < Agents.length; v++) {
                if (userAgentInfo.indexOf(Agents[v]) > 0) { flag = false; break; }
            }
            return flag;
        }
        if (IsPC() && getCookie('newpage') != '1') document.write('<base target="_blank" />')
    </script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
</head>

<body>
    <div id="app">
        <v-app>
            <center>当前网站正在加载中，请稍等</center>
            <template>
                <v-app id="inspire">

                    <v-app-bar app color="primary" dark
                        style="box-shadow: 0 2px 4px -1px rgb(0 0 0 / 5%), 0 4px 5px 0 rgb(0 0 0 / 3%), 0 1px 10px 0 rgb(0 0 0 / 3%)!important">
                        <a href="#" style="color:white;font-size:20px" target="_self">40code</a>
                        <span class="d-none d-sm-flex">
                            <a href="#page=search&name=&author=&type=0&p=1&s=4" style="color:white;font-size:10px"
                                target="_self" class="ml-5">发现作品</a>
                            <a href="#page=search&name=&author=&type=2&p=1&s=1" style="color:white;font-size:10px"
                                target="_self" class="ml-5">工作室</a>
                            <a href="#page=post&id=5" style="color:white;font-size:10px" target="_self"
                                class="ml-5">论坛</a>
                        </span>

                        <v-spacer></v-spacer>

                        <span v-if="detail">

                            <v-btn icon href="#page=message">
                                <span v-if="detail && detail.msgnum">
                                    <v-badge color="red" :content="detail.msgnum" overlap>
                                        <v-icon>mdi-bell</v-icon>
                                    </v-badge>
                                </span>
                                <v-icon v-else>mdi-bell</v-icon>
                            </v-btn>
                            <v-menu>
                                <template v-slot:activator="{ on, attrs }">
                                    <v-btn color="rgb(52,130,207)" dark v-bind="attrs" v-on="on" class="sd"
                                        style="text-transform: none!important;">
                                        <v-avatar size="20" class="mr-2">
                                            <img
                                                :src="host.data+'/static/internalapi/asset/'+(detail.head || '6e2b0b1056aaa08419fb69a3d7aa5727.png')">
                                        </v-avatar>
                                        {{ detail.nickname }}
                                    </v-btn>
                                </template>

                                <v-list>
                                    <v-list-item v-for="(item, index) in items" :key="index" @click="() => {}"
                                        v-on:click="item.c()">
                                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                                    </v-list-item>
                                </v-list>
                            </v-menu>
                        </span>
                        <v-toolbar-title v-else-if="detail===undefined">
                            <a v-on:click="sign.go()" target="_self">
                                <v-btn color="rgb(52,130,207)" class="sd">登录/注册</v-btn>
                            </a>
                        </v-toolbar-title>
                    </v-app-bar>

                    <v-main class="grey lighten-5">

                        <v-container v-if="viewmode=='index'" id="index">
                            <v-row>
                                <v-col cols="12">
                                    <div>
                                        <v-carousel height='auto'>
                                            <v-carousel-item v-for="i in lb" height='auto' :href="i.href">
                                                <v-img :src="i.src"></v-img>
                                            </v-carousel-item>
                                        </v-carousel>
                                    </div>
                                </v-col>
                                <template v-for="n in rows">
                                    <v-col class="mt-2" cols="12">
                                        <v-icon>{{ n.icon }}</v-icon>
                                        <strong>{{ n.title }}</strong>
                                        <a class="float-right" href="#page=search&name=&author=&type=0&p=1&s=3">
                                            <v-btn text>
                                                <v-icon>mdi-arrow-right</v-icon>
                                                更多
                                            </v-btn>
                                        </a>
                                    </v-col>
                                    <v-col v-for="j in n.worklist" cols="6" sm="4" md="3" lg="2">
                                        <s-workcard :work="j" :user="n.userlist[j.author.toString()][0]" :host="host">
                                        </s-workcard>
                                    </v-col>

                                </template>
                                <v-col class="mt-2" cols="12" v-if="viewmode=='index' && user.list">
                                    <v-icon>mdi-medal</v-icon>
                                    <strong>用户榜</strong>
                                    <a class="float-right" href="#page=search&name=&author=&type=1&p=1&s=1">
                                        <v-btn text>
                                            <v-icon>mdi-arrow-right</v-icon>
                                            更多
                                        </v-btn>
                                    </a>
                                </v-col>
                                <v-col v-if="user.list" v-for="j in user.list" :key="`${n}${j}`" cols="6" sm="4" md="3"
                                    lg="2">
                                    <s-usercard :user="j" :host="host"></s-usercard>
                                </v-col>
                                <v-col class="mt-2" cols="12" v-if="viewmode=='index' && studio.ilist">
                                    <v-icon>mdi-format-list-numbered</v-icon>
                                    <strong>工作室榜</strong>
                                    <a class="float-right" href="#page=search&name=&author=&type=2&p=1&s=2">
                                        <v-btn text>
                                            <v-icon>mdi-arrow-right</v-icon>
                                            更多
                                        </v-btn>
                                    </a>
                                </v-col>
                                <v-col v-if="viewmode=='index' && user.list" v-for="j in studio.ilist" :key="`${n}${j}`"
                                    cols="6" sm="4" md="3" lg="2">
                                    <s-studiocard :studio="j" :host="host">
                                        </s-usercard>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='search'" id="search">
                            <v-row>
                                <v-tabs class="mx-3 sd" v-model="search.type">
                                    <v-tab>作品</v-tab>
                                    <v-tab>用户</v-tab>
                                    <v-tab>工作室</v-tab>
                                </v-tabs>
                                <v-col cols="12" class="mx-auto">
                                    <v-card class="sd py-2">
                                        <v-row class="mx-4 mt-4">
                                            <v-col cols="12">
                                                <v-text-field label="作品名"
                                                    onkeypress="if(event.keyCode==13) v.search.search();"
                                                    class="float-left ml-4" id="sname" v-if="search.type==0"
                                                    v-model="search.name">
                                                </v-text-field>
                                                <v-text-field label="作者id"
                                                    onkeypress="if(event.keyCode==13) v.search.search();"
                                                    class="float-left ml-4" id="sauthor" v-if="search.type==0"
                                                    v-model="search.autor">
                                                </v-text-field>
                                                <v-text-field label="用户名"
                                                    onkeypress="if(event.keyCode==13) v.search.search();"
                                                    class="float-left ml-4" id="sname" v-if="search.type==1"
                                                    v-model="search.name">
                                                </v-text-field>
                                                <v-text-field label="工作室名称"
                                                    onkeypress="if(event.keyCode==13) v.search.search();"
                                                    class="float-left ml-4" id="sname" v-if="search.type==2"
                                                    v-model="search.name">
                                                </v-text-field>
                                                <v-btn v-on:click="search.search()" class="float-left ml-4"
                                                    elevation="0" large color="white">
                                                    <v-icon>mdi-magnify</v-icon>
                                                    搜索
                                                </v-btn>
                                            </v-col>
                                            <v-col class="d-flex" cols="6" sm="3">
                                                <v-select class="ml-4" v-model="search.select[search.type]"
                                                    :items="search.s[search.type]" :hint="search.select[search.type]">
                                                </v-select>
                                            </v-col>
                                            <!-- <br><br><br> -->
                                        </v-row>

                                    </v-card>
                                </v-col>
                                <v-col class="mt-2" cols="12">
                                    <span class="ml-2" style="color:#888">为你找到
                                        {{search.num}}
                                        个{{['作品','用户','工作室'][search.type]}}，耗时
                                        {{search.time}}
                                        ms</span>
                                </v-col>
                                <v-col v-for="j in search.work.worklist" cols="6" sm="4" md="3" lg="2"
                                    v-if="search.type==0">
                                    <s-workcard :work="j" :user="search.work.userlist[j.author.toString()][0]"
                                        :host="host"></s-workcard>
                                </v-col>
                                <v-col v-if="search.type==1 && search.user.user" v-for="j in search.user.user" cols="6"
                                    sm="4" md="3" lg="2">
                                    <s-usercard :user="j" :host="host"></s-usercard>
                                </v-col>
                                <v-col v-if="search.type==2 && search.studio.studio" v-for="j in search.studio.studio"
                                    cols="6" sm="4" md="3" lg="2">
                                    <s-studiocard :studio="j" :host="host"></s-studiocard>
                                </v-col>
                            </v-row>
                            <div class="text-center my-3" v-if="search.num>0">
                                <v-pagination v-model="search.page" :length="Math.ceil(search.num/12)"
                                    :total-visible="7" v-on:click="search.search()"></v-pagination>
                            </div>
                        </v-container>

                        <v-container v-if="viewmode=='sign'" id="sign">
                            <v-row>
                                <v-col class="mx-auto" cols="12" md="6">
                                    <v-card class="mx-auto pa-8 my-12" width="400">
                                        <span color="accent">登录/注册</span>
                                        <v-text-field label="邮箱" :rules="sign.email" hide-details="auto" class="my-2"
                                            id="email"></v-text-field>
                                        <!-- <v-text-field label="密码" :rules="sign.pw" hide-details="auto" class="my-2 pb-2" id="pw">
                                                                                                                                                                                                                                                </v-text-field> -->
                                        <v-text-field v-model="password"
                                            :append-icon="show0 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[pw]"
                                            :type="show0 ? 'text' : 'password'" name="input-1" label="密码"
                                            hide-details="auto" counter @click:append="show0 = !show0" id="pw">
                                        </v-text-field>
                                        <div id="c1"></div>
                                        <div cols="12" class="float-center mx-auto mt-2">
                                            <v-btn color="accent" class="pa-2" v-on:click="sign.l(0)">登录</v-btn>
                                            <v-btn color="accent" class="pa-2" v-on:click="sign.l(1)">注册</v-btn>
                                        </div>
                                        <!-- 当前站点为测试站点，数据定期清空，损失概不负责 -->
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='account'" id="account">
                            <v-row>
                                <v-col class="mx-auto" cols="12" md="6">
                                    <v-card class="mx-auto pa-8 my-12 sd">
                                        <span color="accent">信息更改</span>
                                        <v-text-field label="昵称" hide-details="auto" class="my-2" id="i-input-0"
                                            :value="detail.nickname" maxlength="30"></v-text-field>
                                        <!-- <v-btn color="accent" class="pa-2 mx-auto" v-on:click="account.l(0)" block>更改昵称</v-btn> -->
                                        <v-textarea name="input-1" label="个人介绍" :value="detail.introduce"
                                            hint="支持使用markdown编写" id="i-input-1" maxlength="20000" counter></v-textarea>
                                        <!-- <v-btn color="accent" class="pa-2 mx-auto" v-on:click="account.l(1)" block>更改介绍</v-btn> -->

                                        <v-file-input :rules="rules"
                                            accept="image/png, image/jpeg, image/bmp, image/gif" label="头像(建议尺寸1:1)"
                                            id="workimg" show-size truncate-length="10"></v-file-input>
                                        <v-switch v-model="account.newpage" label="不在新窗口打开页面(访问速度会更快。点更改信息后，按下f5生效)"
                                            color="primary" value="1" hide-details></v-switch>
                                        <v-switch v-model="detail.darkmode" v-show="0" label="夜间模式(点更改信息后，按下ctrl+r生效)"
                                            color="primary" value="1" hide-details></v-switch><br><br>
                                        <!-- <v-img :src="host.data+'/static/internalapi/asset/'+ (workview.image || detail.head || '6e2b0b1056aaa08419fb69a3d7aa5727.png')" :aspect-ratio="1"
                                                                                                                                                                                                                                                  class="ma-5 pb-2"></v-img> -->
                                        <div v-if="waitRequest.cover==1">正在上传中……</div>
                                        <div v-if="waitRequest.cover==-1">上传成功</div>
                                        <v-btn color="accent" class="pa-2 mx-auto sd" v-on:click="account.update()"
                                            block>
                                            更改信息</v-btn>

                                        <br>
                                        <v-divider></v-divider><br>

                                        <v-text-field v-model="password2"
                                            :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[pw]"
                                            :type="show1 ? 'text' : 'password'" name="input-2" label="旧密码"
                                            hide-details="auto" counter @click:append="show1 = !show1" id="a_opw">
                                        </v-text-field>
                                        <v-text-field v-model="password3"
                                            :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'" :rules="[pw]"
                                            :type="show2 ? 'text' : 'password'" name="input-3" label="新密码"
                                            hide-details="auto" counter @click:append="show2 = !show2" id="a_npw">
                                        </v-text-field>
                                        <v-btn color="accent" class="pa-2 mx-auto sd" v-on:click="account.n()" block>
                                            更改密码
                                        </v-btn>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='mywork'">
                            <v-row>
                                <template>
                                    <v-col class="" cols="12">
                                        我的作品：<v-btn color="white" class="pa-2 text--secondary" elevation="0"
                                            v-on:click="work.new()">新建作品
                                        </v-btn>
                                    </v-col>

                                    <v-col v-for="j in mywork" cols="6" sm="4" md="3" lg="2">
                                        <s-workcard :work="j" :host="host" :my="work"></s-workcard>
                                    </v-col>

                                    </v-card>
                                </template>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='mystudio'">
                            <v-row>
                                <template>
                                    <v-col class="" cols="12">
                                        我的工作室：<v-btn color="white" class="pa-2 text--secondary" elevation="0"
                                            v-on:click="studio.new()">
                                            新建工作室</v-btn>
                                    </v-col>

                                    <v-col v-for="j in studio.my" :key="`${j}`" cols="12" sm="6" md="4" lg="3">
                                        <s-studiocard :studio="j" :host="host"></s-studiocard>
                                    </v-col>

                                    </v-card>
                                </template>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='work'">
                            <v-row>
                                <template>
                                    <div class="mx-3 pa-5 my-12" class="float-center" v-if="!workview.id">
                                        作品信息正在加载中
                                    </div>
                                    <v-col cols="12" v-else-if="(workview.isauthor || workview.publish)">
                                        <v-card class="mx-auto pa-5 my-12 sd">
                                            <v-row>
                                                <v-col cols="12">
                                                    <v-alert dense type="info" v-if="!workview.publish">
                                                        当前作品还没有发布，仅自己可见，请前往
                                                        <a :href="'#page=workinfo&id='+workview.id">作品信息编辑页</a>
                                                        勾选发布，再点更新，即可发布
                                                    </v-alert>
                                                    <v-alert dense outlined type="error" v-if="workview.ban">
                                                        当前作品已被封禁，请联系QQ:3274235903 进行申诉
                                                    </v-alert>
                                                    <span color="accent" class="text-h5" cols="24">{{ workview.name
                                                        }}</span>
                                                    <div cols="24">
                                                        <a :href="`#page=user&id=`+workview.author">
                                                            <v-avatar size="25">
                                                                <img
                                                                    :src="host.data+'/static/internalapi/asset/'+(workview.head || '6e2b0b1056aaa08419fb69a3d7aa5727.png')">
                                                            </v-avatar>
                                                            <span color="accent" class="text-subtitle-1"
                                                                v-on:click="qh('user', workview.author);">{{
                                                                workview.nickname }}</span>
                                                        </a>
                                                        <span color="accent"
                                                            class="text-subtitle-1 text-right text--disabled mx-2">
                                                            创建:{{date(workview.time)}}
                                                        </span>
                                                        <span color="accent"
                                                            class="text-subtitle-1 text-right text--disabled mx-2">
                                                            更新:{{date(workview.update_time)}}
                                                        </span>
                                                        <span color="accent"
                                                            class="text-subtitle-1 text-right text--disabled mx-2">
                                                            发布:{{date(workview.publish_time)}}
                                                        </span>
                                                    </div>
                                                </v-col>

                                                <v-col cols="12" md="7">
                                                    <v-responsive :aspect-ratio="51/44">
                                                        <!-- <iframe
                                                            :src="(workview.id) ? ( (workview.isauthor || (workview.publish)) ? ('/other/worksc.html') : '/noqx.html') : '/d.html'"
                                                            scrolling="no" frameborder="0"
                                                            style="width:100%;height:100%"></iframe> -->
                                                        <iframe
                                                            v-if="workview.id && (workview.isauthor || (workview.publish))"
                                                            src="/other/worksc.html" scrolling="no" frameborder="0"
                                                            style="width:100%;height:100%"></iframe>
                                                        <span v-else>
                                                            无权限访问此作品
                                                        </span>
                                                    </v-responsive>
                                                    <v-btn v-on:click="work.like()"
                                                        :color="workview.islike ? 'red' : ''" plain text>
                                                        <v-icon>mdi-heart</v-icon>
                                                        {{ workview.like }}
                                                    </v-btn>
                                                    <v-btn v-on:click="work.analysis()" plain text>
                                                        <v-icon>mdi-search</v-icon>代码分析
                                                    </v-btn>
                                                    <v-btn :href="'/other/workpreview.html#id='+workview.id" plain text>
                                                        <v-icon>mdi-fullscreen</v-icon>全屏
                                                    </v-btn>
                                                </v-col>
                                                <v-col>
                                                    <v-row>
                                                        <v-col cols="12" style="overflow:auto;height:400px">
                                                            <span color="accent" class="text-h5 text--primary"
                                                                cols="24">作品介绍</span><br><br>

                                                            <span class="text--secondary pm"
                                                                v-html="workview.introduce2"></span>

                                                            <br><br>
                                                        </v-col cols="12">
                                                        <v-col>
                                                            <v-btn color="accent" class="ma-2"
                                                                :href="'/other/scratch.html#id='+workview.id"
                                                                target="_blank"
                                                                v-bind:disabled="!(workview.isauthor || workview.opensource) || !workview.issign">
                                                                转到创作页
                                                            </v-btn>
                                                            <v-btn color="accent" class="ma-2"
                                                                :href="'#page=workinfo&id='+workview.id"
                                                                v-if="workview.isauthor">编辑作品信息</v-btn>
                                                        </v-col>
                                                    </v-row>
                                                    <!--                                                     
                                                    <v-divider class=""></v-divider>
                                                    <br><br> -->

                                                </v-col>
                                            </v-row>


                                        </v-card>
                                    </v-col>

                                    <div class="mx-3 pa-5 my-12" class="float-center" v-else>
                                        无权限查看当前作品
                                    </div>
                                    <v-col cols="12" v-if="workview && (workview.isauthor || workview.publish)">
                                        <v-card class="mx-auto pa-5 my-5 sd">
                                            <span color="accent" class="text-h5 text--primary"
                                                cols="24">评论</span><br><br>
                                            <s-c2 :comment="comment" :host="host" :detail="detail"></s-c2>
                                            <s-comment :comment="comment" :host="host" :detail="detail" type="1"
                                                :author="workview.author"></s-comment>
                                        </v-card>
                                    </v-col>


                                </template>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='workinfo'">
                            <v-row>
                                <v-col class="mx-auto" cols="12" md="6">
                                    <v-card class="pa-8 my-12" v-if="!workview.id">
                                        作品信息正在加载中
                                    </v-card>
                                    <v-card class="pa-8 my-12" v-else-if="(workview.isauthor)">
                                        <v-text-field label="作品名" hide-details="auto" class="my-2" name="editinfo"
                                            t="name" :value="workview.name"></v-text-field>
                                        <v-textarea label="作品介绍" hide-details="auto" class="my-2" name="editinfo"
                                            t="introduce" :value="workview.introduce"></v-textarea>
                                        <v-checkbox v-model="publish" value :label="`发布 `" name="editinfo" t="publish">
                                        </v-checkbox>
                                        <v-checkbox v-model="opensource" value :label="`开源 `" name="editinfo"
                                            t="opensource"></v-checkbox>
                                        <v-file-input :rules="rules"
                                            accept="image/png, image/jpeg, image/bmp, image/gif" label="作品封面图(建议尺寸4:3)"
                                            id="workimg" show-size truncate-length="10"></v-file-input>
                                        <v-img :src="host.data+'/static/internalapi/asset/'+workview.image"
                                            :aspect-ratio="4/3" class="ma-5 pb-2"></v-img>
                                        <div v-if="waitRequest.cover==1">正在上传中</div>
                                        <div v-if="waitRequest.cover==-1">点击更新保存你的头像</div>
                                        <div class="mx-auto">
                                            <v-btn color="accent" class="pa-2" v-on:click="work.update()">更新</v-btn>
                                            <v-btn color="accent" class="pa-2" v-on:click="work.return()">返回</v-btn>
                                        </div>
                                    </v-card>
                                    <v-card class="pa-8 my-12" v-else>
                                        无权限查看当前作品
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='user'">
                            <v-row>
                                <v-col class="mx-auto pa-5 my-12" v-if="!workview.id">
                                    用户信息正在加载中
                                </v-col>
                                <template v-else-if="(!workview.ban || workview.id==detail.id)" class="mx-auto ">
                                    <v-col cols="12">
                                        <v-card class="pa-5 sd">
                                            <v-row>
                                                <v-col cols="12" sm="8" md="6">
                                                    <v-row>
                                                        <span style="flex:0 0 140px">
                                                            <v-avatar size="120">
                                                                <img
                                                                    :src="host.data+'/static/internalapi/asset/'+(workview.head || '6e2b0b1056aaa08419fb69a3d7aa5727.png')">
                                                            </v-avatar>
                                                        </span>
                                                        <span style="flex:0 0 calc( 100% - 150px ) ">
                                                            <v-row no-gutters>
                                                                <v-col cols="12">
                                                                    <span color="accent" class="text-h5"
                                                                        v-if="workview.id!=detail.id || user.edit!=1">{{
                                                                        workview.nickname }} <span
                                                                            style="color:#888;font-size: 6px;">#{{workview.id}}</span></span>
                                                                    <v-text-field label="昵称" :value="detail.nickname"
                                                                        id="nnedit" v-else>
                                                                    </v-text-field>

                                                                    <v-btn small class="sd tg"
                                                                        v-on:click="user.edit==1?(user.edit=0):(user.edit=1)"
                                                                        v-if="workview.id==detail.id"
                                                                        :style="(workview.id==detail.id && user.edit==1)?'margin-top: -25px;':''">
                                                                        <span>
                                                                            <v-icon>mdi-edit</v-icon><span
                                                                                v-if="user.edit==1">取消</span>编辑
                                                                        </span>
                                                                    </v-btn>
                                                                    <v-btn color="accent" v-on:click="account.edits(1)"
                                                                        v-if="workview.id==detail.id && user.edit==1"
                                                                        class="sd" style="margin-top: -25px;" small>保存
                                                                    </v-btn>

                                                                    <a :href="`#page=studio&id=${workview.studio.id}`"
                                                                        v-if="workview.studio">
                                                                        <v-btn style="text-transform: none!important;"
                                                                            :color="workview.studio.color || 'green'"
                                                                            class="sd tg" small>
                                                                            <span style="color:white">{{
                                                                                workview.studio.name }}</span>
                                                                        </v-btn>
                                                                    </a>
                                                                </v-col>
                                                                <v-col cols="12" style="color:#888;font-size: 6px;">
                                                                    {{date(workview.signtime) }} 加入
                                                                </v-col>
                                                                <v-col cols="12" style="color:#888;font-size: 6px;">
                                                                    {{date(workview.last_active) }} 最后活跃
                                                                </v-col>
                                                                <v-col cols="12" class="mt-2">
                                                                    <v-btn class="sd" v-on:click="user.signin()"
                                                                        color="accent" v-if="workview.id==detail.id">
                                                                        签到</v-btn>
                                                                    <v-btn class="sd" color="accent"
                                                                        v-on:click="user.follow()" v-else>
                                                                        {{
                                                                        workview.followu ? '取消' : ''}}关注
                                                                    </v-btn>
                                                                </v-col>
                                                            </v-row>
                                                        </span>
                                                    </v-row>

                                                </v-col>
                                                <v-col>
                                                    <a>
                                                        <v-btn text class="text-subtitle-1 text--secondary sd tg"
                                                            :href=" `#page=flist&id=`+workview.id">{{
                                                                workview.fan }}
                                                            粉丝
                                                        </v-btn>
                                                    </a>
                                                    <a :href="`#page=flist&f=1&id=`+workview.id">
                                                        <v-btn text class="text-subtitle-1 text--secondary sd tg">{{
                                                                workview.follow }}
                                                            关注</v-btn>
                                                    </a><br>
                                                    <v-tooltip bottom>
                                                        <template v-slot:activator="{ on, attrs }">
                                                            <span color="accent" class="text-subtitle-1 " v-bind="attrs"
                                                                v-on="on">
                                                                <span class="text--disabled">金币：</span>
                                                                <span style="color:#FF9800;">{{ workview.coins
                                                                        }}</span>
                                                            </span>
                                                        </template>
                                                        <span>获取方式：<br>
                                                            1.签到(每次所得金币数是四舍五入(当月连续签到天数+4)<br>
                                                            2.分享作品，点击作品展示页下方的分享，按照上面的提示做<br>
                                                            3.点赞作品，点赞1作品金币+3<br>
                                                            4.被点赞作品，被点赞1次金币+4<br>
                                                        </span>
                                                    </v-tooltip>
                                                </v-col>
                                            </v-row>
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-card class="pa-5 sd pm">
                                            <span color="accent" class="text-h5 text--primary" cols="24">用户介绍</span>
                                            <v-btn v-on:click="user.edit==2?(user.edit=0):(user.edit=2)"
                                                v-if="workview.id==detail.id" :class="'sd '+(user.edit!=2?null:'tg')"
                                                :color="user.edit==2?null:'accent'">
                                                <v-icon>mdi-edit</v-icon><span v-if="user.edit==2">取消</span>编辑
                                            </v-btn>
                                            <v-btn v-on:click="account.edits(2)"
                                                v-if="workview.id==detail.id && user.edit==2" color="accent" class="sd">
                                                保存</v-btn>
                                            <br><br>

                                            <span v-html="workview.introduce2"
                                                v-if="workview.id!=detail.id || user.edit!=2"></span>
                                            <span v-else>
                                                <v-textarea label="介绍" :value="workview.introduce"
                                                    hint="支持markdown，您可以拖动输入框右下角的三条斜线以拉大输入框" id="iedit"></v-textarea>
                                            </span>
                                        </v-card>
                                    </v-col>

                                    <v-col cols="12">
                                        <span>他的作品：</span>
                                        <a class="float-right"
                                            :href="'#page=search&name=&type=0&p=1&s=0&author='+workview.id">
                                            <v-btn text>更多</v-btn>
                                        </a><br>
                                    </v-col>

                                    <template v-if="worklist" cols="12">
                                        <v-col v-for="j in worklist" cols="6" sm="4" md="3" lg="2">
                                            <s-workcard :work="j" :host="host"></s-workcard>
                                        </v-col>
                                    </template>
                                    <span v-else>当前用户还没有作品哦</span>
                                    <v-col cols="12">
                                        <v-card class=" pa-5 sd">
                                            <span color="accent" class="text-h5 text--primary" cols="24">评论 </span><span
                                                style="color:#888" class="ml-3">{{comment.comment &&
                                                (comment.comment.num+' 条评论')}}</span><br><br>
                                            <s-c2 :comment="comment" :host="host" :detail="detail"></s-c2>
                                            <s-comment :comment="comment" :host="host" :detail="detail" type="0">
                                            </s-comment>
                                        </v-card>
                                    </v-col>


                                </template>

                                <v-col class="mx-auto pa-5 my-12" width="600" v-else>
                                    无权限查看当前用户
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='studio'">
                            <v-row>
                                <v-col class="mx-auto pa-5 my-12" v-if="!studio.info">
                                    工作室信息正在加载中
                                </v-col>
                                <template v-else class="mx-auto ">
                                    <v-col cols="12">
                                        <v-card class="pa-5 sd">
                                            <v-row>
                                                <span style="flex:0 0 140px">
                                                    <v-avatar size="120">
                                                        <img
                                                            :src="host.data+'/static/internalapi/asset/'+(studio.info.head || '6e2b0b1056aaa08419fb69a3d7aa5727.png')">
                                                    </v-avatar>

                                                </span>
                                                <span v-if="detail && detail.id" style="flex:0 0 140px">
                                                    <span color="accent"
                                                        class="text-h5">{{ studio.info.name }}</span><br>
                                                    <a :href="`#page=forum&sid=${studio.info.id}`">
                                                        <v-btn color="accent" class="my-2 sd">论坛
                                                        </v-btn>
                                                    </a>
                                                    <a v-if="studio.p>0"
                                                        :href="`#page=studio_edit&id=${studio.info.id}`">
                                                        <v-btn color="accent" class="my-2 sd">编辑信息
                                                        </v-btn>
                                                    </a>
                                                    <v-btn v-if="studio.p===undefined" class="py-2 sd"
                                                        v-on:click="studio.join()" color="accent">
                                                        加入
                                                    </v-btn>
                                                    <v-btn v-else-if="studio.p!==3" v-on:click="studio.quit()"
                                                        color="accent" class="my-2 sd">
                                                        退出</v-btn>
                                                    <v-btn v-if="studio.p!==undefined" v-on:click="studio.main()"
                                                        color="accent" class="my-2 sd">
                                                        设为主室</v-btn>
                                                    <v-btn v-if="studio.p!==undefined" v-on:click="studio.upload()"
                                                        color="accent" class="my-2 sd">
                                                        投稿作品</v-btn>
                                                </span>
                                                <span color="accent" class="text-subtitle-1 float-right text--disabled">创建时间：{{
                                                    date(studio.info.created_time) }}</span><br>
                                            </v-row>
                                        </v-card>
                                    </v-col>
                                    <v-col cols="12">
                                        <v-card class="pa-5 sd">
                                            <span color="accent" class="text-h5 text--primary"
                                                cols="24">工作室介绍</span><br><br>
                                            <span class="text--secondary pm" v-html="studio.info.introduce2"></span>
                                        </v-card>
                                    </v-col>

                                    <v-col cols="12">
                                        <span>工作室作品：</span>
                                        <a class="float-right" :href="`#`">
                                            <v-btn text>更多</v-btn>
                                        </a><br>
                                    </v-col>

                                    <template v-if="studio.worklist" cols="12">
                                        <v-col v-for="j in studio.worklist" cols="6" sm="4" md="3" lg="2">
                                            <s-workcard :work="j" :host="host"></s-workcard>
                                        </v-col>
                                    </template>
                                    <span v-else>当前工作室无作品</span>

                                    <v-col cols="12">
                                        <span>工作室成员：</span>
                                        <a class="float-right" :href="`#`">
                                            <v-btn text>更多</v-btn>
                                        </a><br>
                                    </v-col>

                                    <template v-if="studio.userlist" cols="12">
                                        <v-col v-for="j in studio.userlist" cols="6" sm="4" md="3" lg="2">
                                            <s-usercard :user="j" :host="host">
                                                </s-workcard>
                                        </v-col>
                                    </template>
                                    <span v-else>当前工作室无成员</span>
                                    <v-col cols="12">
                                        <v-card class=" pa-5 sd">
                                            <span color="accent" class="text-h5 text--primary"
                                                cols="24">评论</span><br><br>
                                            <s-c2 :comment="comment" :host="host" :detail="detail"></s-c2>
                                            <s-comment :comment="comment" :host="host" :detail="detail" type="2">
                                            </s-comment>
                                        </v-card>
                                    </v-col>


                                </template>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='studio_edit'">
                            <v-row>
                                <v-col cols="12" md="7" class="mx-auto">
                                    <span v-if="!studio.info">请等待 正在加载中</span>
                                    <v-card class=" pa-8 my-12" v-else>
                                        <a :href="`#page=studio&id=${studio.info.id}`">{{ studio.info.name }}</a>
                                        <v-text-field label="工作室名" hide-details="auto" class="my-2" name="editinfo"
                                            t="s-name" :value="studio.info.name" maxlength="30"></v-text-field>
                                        <v-textarea label="工作室介绍" hide-details="auto" class="my-2" name="editinfo"
                                            t="s-introduce" :value="studio.info.introduce" maxlength="20000">
                                        </v-textarea>

                                        <v-checkbox v-model="studio.info.haspw" label="启用密码" value name="editinfo"
                                            t="publish"></v-checkbox>

                                        <v-text-field label="密码" hide-details="auto" class="mx-3" name="editinfo"
                                            t="s-pw" :value="studio.info.pw" v-if="studio.info.haspw" width="100px">
                                        </v-text-field>

                                        <v-radio-group v-model="studio.info.chose" mandatory>
                                            <v-radio :label="`允许${studio.info.haspw?'输对密码的':''}所有人加入`" value="0">
                                            </v-radio>
                                            <v-radio :label="`允许${studio.info.haspw?'输对密码并':''}没有工作室的人加入`" value="1">
                                            </v-radio>
                                            <v-radio label="禁止任何人加入" value="2"></v-radio>
                                        </v-radio-group>

                                        <v-text-field label="工作室头衔颜色(仅支持英文，例如green)" hide-details="auto" class="mx-3"
                                            t="s-color" :value="studio.info.color" width="100px"></v-text-field>

                                        <v-file-input :rules="rules"
                                            accept="image/png, image/jpeg, image/bmp, image/gif" label="工作室头像(建议尺寸1:1)"
                                            id="simg" show-size truncate-length="10"></v-file-input>
                                        <v-img :src="host.data+'/static/internalapi/asset/'+workview.image"
                                            :aspect-ratio="1" class="ma-5 pb-2 px-12"></v-img>
                                        <div v-if="waitRequest.cover==1">正在上传中</div>
                                        <div v-if="waitRequest.cover==-1">点击更新保存你的头像</div>
                                        <div class="mx-auto">
                                            <v-btn color="accent" class="pa-2" v-on:click="studio.update()">更新</v-btn>
                                        </div>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='message'">
                            <v-row>
                                <v-col cols="12" sm="10" md="9" lg="7" class="mx-auto">
                                    <v-card class="sd pa-8 my-12" v-if="user.message">
                                        <span v-for="i in user.message">
                                            <span v-html="i.message"></span>
                                            <v-btn icon class=" ml-2 float-right" v-on:click="user.delmsg(i.id)">
                                                <v-icon>mdi-delete</v-icon>
                                            </v-btn>
                                            <span color="accent" class="text-h7 text--disabled ml-2 float-right">
                                                <span>{{ i.time }}</span>
                                            </span>
                                            <br><br>
                                        </span>
                                        <div class="text-center my-3" v-if="user.msgtotal>0">
                                            <v-pagination v-model="user.msgpage" :length="Math.ceil(user.msgtotal/20)"
                                                :total-visible="7"></v-pagination>
                                        </div>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='flist'">
                            <v-row>
                                <v-col class="mx-auto">
                                    <v-row>
                                        <v-col v-for="j in user.flist" cols="6" sm="4" md="3" lg="2">
                                            <s-usercard :user="j" :host="host"></s-usercard>
                                        </v-col>
                                    </v-row>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='404'">
                            <v-row>
                                <v-col class="mx-auto">
                                    <v-card class="mx-auto pa-8 my-12">
                                        当前页面不存在 404 not found
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='about'">
                            <v-row>
                                <v-col class="mx-auto">
                                    <v-card class="mx-auto pa-8 my-12">
                                        <h1>关于我们：</h1>
                                        40code是由网名为what的人开发的一款在线少儿编程平台，基于Scratch开发，支持手机端作品展示。
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='post'">
                            <v-row>
                                <v-col cols="12">
                                    <v-breadcrumbs
                                        :items="[{text:forum.post.studio.name,href:'#page=studio&id='+forum.post.studio.id},{text:'论坛',href:'#page=forum&sid='+forum.post.studio.id},{text:forum.post.text.title}]"
                                        divider=">"></v-breadcrumbs>
                                </v-col>
                                <v-col class="mx-auto">
                                    <v-card class="mx-auto pa-8 my-2">
                                        <div class="text-h5">{{ forum.post.text.title }}<span style="color:#aaa"
                                                class="pl-4">#{{forum.post.text.id}}</span></div><br>
                                        <div><a :href="'#page=user&id='+forum.post.author.id" class="text-h6">
                                                <v-avatar size="20">
                                                    <img
                                                        :src="host.data+'/static/internalapi/asset/'+(forum.post.author.head || '6e2b0b1056aaa08419fb69a3d7aa5727.png')">
                                                </v-avatar>
                                                {{ forum.post.author.nickname }}
                                                <span style="color:#888;font-size: 6px;" class="pl-4">
                                                    {{date(forum.post.text.new_time) }}
                                                </span>
                                            </a></div><br>
                                        <div v-html="forum.post.text.context2" class="pm"></div>
                                    </v-card>
                                </v-col>
                                <v-col cols="12">
                                    <v-card class=" pa-5 sd">
                                        <span color="accent" class="text-h5 text--primary" cols="24">评论</span><br><br>
                                        <s-c2 :comment="comment" :host="host" :detail="detail"></s-c2>
                                        <s-comment :comment="comment" :host="host" :detail="detail" type="3">
                                        </s-comment>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-container>

                        <v-container v-if="viewmode=='forum'">
                            <v-row>
                                <v-col cols="12">
                                    <v-dialog v-model="forum.dialog" width="500">
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-breadcrumbs
                                                :items="[{text:forum.studio.name,href:'#page=studio&id='+forum.studio.id},{text:'论坛',href:'#page=forum&sid='+forum.studio.id}]"
                                                divider=">"></v-breadcrumbs>
                                            <v-btn color="red lighten-2" dark v-bind="attrs" v-on="on">
                                                发布帖子
                                            </v-btn>
                                        </template>

                                        <v-card class="px-3">
                                            <v-card-title class="text-h5 grey lighten-2">
                                                帖子发出
                                            </v-card-title>

                                            <v-text-field label="标题" id="ftitle"></v-text-field>
                                            <v-textarea label="帖子内容" value="发点什么吧" id="fcontext"></v-textarea>

                                            <v-divider></v-divider>

                                            <v-card-actions>
                                                <v-spacer></v-spacer>
                                                <v-btn color="primary" text @click="forum.send();"
                                                    :disable="forum.sending">
                                                    发布
                                                </v-btn>
                                                <v-btn color="primary" text @click="forum.dialog = false">
                                                    取消
                                                </v-btn>
                                            </v-card-actions>
                                        </v-card>
                                    </v-dialog>
                                </v-col>
                                <v-col cols="12" color="white">
                                    <v-card class="pa-6">
                                        <div v-for="i in forum.list" :key="i">
                                            <div class="my-7">
                                                <a :href="'#page=post&id='+i.id" class="text-h6"
                                                    v-text="i.title"></a><span style="color:#aaa"
                                                    class="pl-4">#{{i.id}}</span><br>
                                                <div class="mt-1">
                                                    <a :href="'#page=user&id='+i.author">
                                                        <v-avatar size="20">
                                                            <img
                                                                :src="host.data+'/static/internalapi/asset/'+(forum.user[i.author][0].head || '6e2b0b1056aaa08419fb69a3d7aa5727.png')">
                                                        </v-avatar>{{forum.user[i.author][0].nickname}}
                                                        <span style="color:#aaa"
                                                            class="pl-4">{{date(i.new_time)}}</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- <v-divider></v-divider> -->
                                        </div>

    </div>
    </v-card>
    </v-col>
    </v-row>
    </v-container>

    </v-main>

    <v-footer padless>
        <v-col cols="12" class="px-5">

            <span>
                <div class="float-left">
                    <span class="l">友情链接：</span><br>
                    <a href="//bu40.com" target="_blank" class="l">bu40工具集</a><br>
                    <a href="//sc.bu40.com" target="_blank" class="l">scratch最新版下载</a><br>
                    <a href="http://150.158.13.104/" target="_blank" class="l">氧化钙编程社区</a><br>
                </div>
                <div class="float-left ml-5">
                    <span class="l">更多：</span><br>
                    <a href="https://jq.qq.com/?_wv=1027&k=7X0G5yel" target="_blank" class="l">Q群:1071652975</a><br>
                    <!-- <a href="https://www.baidu.com/s?wd=40code%E7%A4%BE%E5%8C%BA" target="_blank" class="l">在此点击40code社区以支持我们</a><br> -->
                    <!-- <a href="//github.com/52black/sccode" target="_blank" class="l">此站点前端源代码</a><br> -->
                    <span class="l"> bug反馈/友链添加/功能建议加：</span><br>
                    <a class="l">站长QQ:3274235903</a>

                </div>

            </span>
            <span class="float-right l">{{ new Date().getFullYear() }}
                —
                <strong>40CODE</strong>
            </span>
        </v-col>
    </v-footer>

    </v-app>
    <v-snackbar v-model="sb.show" :timeout="sb.timeout" top>
        <span v-html="sb.text"></span>

        <template v-slot:action="{ attrs }">
            <v-btn color="blue" text v-bind="attrs" @click="sb.show = false">
                关闭
            </v-btn>
        </template>
    </v-snackbar>
    <v-dialog v-model="sb2.show" width="500">
        <v-card>

            <v-card-title v-html="sb2.text" class="pt-3"></v-card-title>

            <v-divider></v-divider>

            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="primary" text @click="sb2.show = false">
                    关闭
                </v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
    </template>
</body>

</html>
</v-app>
</v-card-text>
</div>
<script src="https://cdn.staticfile.org/vue/2.6.9/vue.js"></script>
<script src="https://cdn.staticfile.org/vuetify/2.5.8/vuetify.min.js"></script>
<script src="/js/app.js"></script>
<script src="/js/index.js"></script>
<script charset="UTF-8" id="LA_COLLECT" src="//sdk.51.la/js-sdk-pro.min.js"></script>
<script>LA.init({ id: "JW9Ijj81HxjUscHB", ck: "JW9Ijj81HxjUscHB", hashMode: true })</script>
</body>

</html><!-- https://uytmyv-iqnzlm-3000.preview.myide.io/ -->