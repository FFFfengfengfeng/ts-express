/*
 * =====================================================
 * PlugName: Page
 * 分页器
 * =====================================================
 */
+ function (window, $) {
    'use strict';

    //默认参数
    var defaults = {
        size   : 0,    //每页显示数据
        total  : 0,    //数据总数
        keyword: '',   //关键字
        fn     : null  //执行函数
    };

    /*
     * 构造函数
     * @param element{jQuery对象}
     * @param options{配置对象}
     */
    function Page(element, options) {
        this.$element = $(element);
        this.options  = $.extend(defaults, options || {});
        this.init();
    }
    
    Page.prototype.init = function () {
        var _this = this;

        _this.creatDom();
        _this.event();
    }

    Page.prototype.creatDom = function () {
        var _this   = this,
            options = _this.options,
            total   = parseInt(options.total),
            size    = parseInt(options.size),
            pageNum = Math.ceil(total / size),
            $pageBtn = '',
            $prevBtn = '<li><a href="javascript:;" class="page-prev" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>',
            $nextBtn = '<li><a href="javascript:;" class="page-next" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        if (pageNum < 2) {
            $pageBtn = '<li><a href="javascript:;" class="active">1</a></li>';
        }
        // else if (pageNum < 3){
        //     for (var i = 0; i < pageNum; i ++) {
        //         $pageBtn += '<li><a href="javascript:;" class="page-num '  + (i === 0 ? 'active' : '' ) + '">' + (i + 1) + '</a></li>';
        //     }
        //     $pageBtn += $nextBtn;
        // }
        else {
            $pageBtn += $prevBtn;
            for (var i = 0; i < pageNum; i ++) {
                $pageBtn += '<li><a href="javascript:;" class="page-num '  + (i === 0 ? 'active' : '' ) + '">' + (i + 1) + '</a></li>';
            }
            $pageBtn += $nextBtn;
        }
        _this.$element.html($pageBtn);

        _this.$prevBtn = _this.$element.find('.page-prev');
        _this.$nextBtn = _this.$element.find('.page-next');
        _this.$numBtn  = _this.$element.find('.page-num');
    }

    Page.prototype.event = function () {
        var _this = this;

        //上一页
        _this.$element.on('click', '.page-prev', function () {
            var $current = _this.$element.find('.page-num.active'),
                $numBtn = _this.$element.find('.page-num'),
                index    = $numBtn.index($current);
            if (index === 0) {
                return
            } else {
                $numBtn.removeClass('active');
                $current.parent().prev().find('.page-num').addClass('active');
                _this.options.fn(_this.options.keyword, index);
            }
        });

        //下一页
        _this.$element.on('click', '.page-next', function () {
            var $current = _this.$element.find('.page-num.active'),
                $numBtn = _this.$element.find('.page-num'),
                index    = $numBtn.index($current);
            if (index === $numBtn.length - 1) {
                return
            } else {
                $numBtn.removeClass('active');
                $current.parent().next().find('.page-num').addClass('active');
                console.log(index + 2);
                _this.options.fn(_this.options.keyword, index + 2);
            }
        })

        _this.$element.on('click', '.page-num', function () {
            var $this = $(this),
                $numBtn = _this.$element.find('.page-num');
            $numBtn.removeClass('active');
            $this.addClass('active');

            var $current = _this.$element.find('.page-num.active'),
                index = $numBtn.index($current);

            _this.options.fn(_this.options.keyword, index + 1);
        });
    }

    $.fn.page = function (options) {
        var options = $.extend(defaults, options || {});

        return new Page($(this), options);
    }

}(window, jQuery);

+ function (window, $) {
    $.extend({
        queryString: function (name) {
            var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
            var r = window.location.search.substr(1).match(reg);
            if(r!=null) {
                return
            } else {
                unescape(r[2]);
                return null;
            }
        }
    })
}(window, jQuery);