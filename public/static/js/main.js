/*
 * ================================================================
 * 处理cookie
 * 序列化cookie
 * $.cookie(key)              读取cookie
 * $.cookie(key, value, time) 设置cookie
 * $.cookie(key, null)        删除cookie
 * ================================================================
 */
    + function (window, $) {
        'use strict';

        function Cookie(key, value) {
            this.data = {};
            this.init();
        }
        Cookie.prototype.init = function () {
            var _this      = this,
                cookie     = document.cookie,
                arr        = cookie.split('; ');

            for (var i = 0; i < arr.length; i ++) {
                _this.data[arr[i].split('=')[0]] = arr[i].split('=')[1];
            }
        }

        Cookie.prototype.hasCookie = function (key) {
            var _this = this;

            return (_this.data[key] === undefined) ? false : true;
        }

        Cookie.prototype.addCookie = function (key, value, time) {
            var _this  = this,
                exdate = new Date();
            exdate.setDate(exdate.getDate() + time);
            document.cookie = key + "=" + value + ";expires=" + exdate.toGMTString();

            _this.init();
        }

        Cookie.prototype.getCookie = function (key) {
            var _this = this;

            return _this.hasCookie(key) ? _this.data[key] : null;
        }

        Cookie.prototype.removeCookie = function (key) {
            var _this = this;

            if (_this.hasCookie(key)) {
                document.cookie = key + "=" + '';
            }
            _this.init();
        }
        $.extend({
            cookie: function (key, value, time) {
                var cookie = new Cookie(key, value);

                if (value === undefined) {
                    return cookie.getCookie(key);
                } else if (value === null){
                    cookie.removeCookie(key);
                    return null;
                } else {
                    cookie.addCookie(key, value, time);
                    return cookie.getCookie(key);
                }
            }
        });

    }(window, jQuery);

/*
 * ================================================================
 * toast提示框
 * @param {type}     String 提示类型 'success' || 'error'
 * @param {message}  String 提示信息
 * @param {duration} Number 停留时长
 * ================================================================
 */
+ function (window, $) {
    'use strict';

    /*
     * 默认参数
     */
    var defaults = {
        type: 'success',
        message: '打开了',
        duration: 1000,
    };

    /*
     * 构造函数
     * @param options
     */
    function Toast(options) {
        this.options = $.extend(defaults, options || {});
        this.init();
    }

    Toast.prototype.init = function () {
        var _this = this;

        _this.$body = $('body');
        _this.createDOM();
    }

    Toast.prototype.createDOM = function () {
        var _this   = this,
            options = _this.options,
            type    = options.type,
            message = options.message,
            $body   = $('body');

        _this.$toast = $('<div class="toast ' + type + ' clearfix"><p >' + message + '</p><a href="javascript:;" class="fa fa-close"></a></div>');

        _this.$body.append(_this.$toast);
    }

    Toast.prototype.show = function () {
        var _this = this;

        _this.$toast.addClass('show in');
    }

    Toast.prototype.hide = function () {
        var _this    = this,
            options  = _this.options,
            duration = options.duration;

        _this.$toast.removeClass('show in');

        setTimeout(function () {
            _this.remove();
        }, duration);
    }

    Toast.prototype.remove = function () {
        var _this = this;

        _this.$toast.remove();
    }
    $.extend({
        toast: function (options) {
            var toast = new Toast(options);

            toast.show();

            var duration = options.duration || 1000;

            setTimeout(function () {
                toast.hide();
            }, duration);
        }
    });
}(window, jQuery);

/*
 * ================================================================
 * delete方法
 * ================================================================
 */
$(function () {
    $('body').on('click', '.btn-delete', function (e) {
        var $this = $(this),
            url   = $this.attr('data-url'),
            id    = $this.attr('data-id');
        console.log(url, id);
        $.ajax({
            url: url,
            dataType: 'json',
            data: {
                id: id
            },
            success: function (res) {
                if (res.success === '1') {
                    $.toast({
                        type: 'success',
                        message: res.message
                    });
                    $('.tr-content[data-id=' + res.id + ']').remove();
                } else {
                    $.toast({
                        type: 'error',
                        message: res.message
                    });
                }
            }
        });
    })
});
/*
 * ================================================================
 * add方法
 * ================================================================
 */
$(function () {
    $('body').on('click', '.btn-add', function (e) {
        var $this    = $(this),
            url      = $this.attr('data-url'),
            form     = $this.attr('data-form'),
            redirect = $this.attr('data-redirect'),
            formData = $('#' + form).serialize();
        $.ajax({
            url: url,
            dataType: 'json',
            data: formData,
            success: function (res) {
                if (res.success === '1') {
                    $.toast({
                        type: 'success',
                        message: res.message
                    });
                    window.location.href = redirect;
                } else {
                    $.toast({
                        type: 'error',
                        message: res.message
                    });
                }
            }
        });
    })
});
/*
 * ================================================================
 * edit方法
 * ================================================================
 */
$(function () {
    $('body').on('click', '.btn-edit', function (e) {
        var $this    = $(this),
            id       = $this.attr('data-id'),
            url      = $this.attr('data-url'),
            form     = $this.attr('data-form'),
            redirect = $this.attr('data-redirect'),
            formData = $('#' + form).serialize();
        formData += ('&id=' + id);
        $.ajax({
            url: url,
            dataType: 'json',
            data: formData,
            success: function (res) {
                if (res.success === '1') {
                    $.toast({
                        type: 'success',
                        message: res.message
                    });
                    window.location.href = redirect;
                } else {
                    $.toast({
                        type: 'error',
                        message: res.message
                    });
                }
            }
        });
    })
});
/*
 * ================================================================
 * 日期插件调用
 * ================================================================
 */
$(function () {
    $('.data-picker').datetimepicker({

    });
});
/*
 * ================================================================
 * select
 * ================================================================
 */
$(function () {
    $('.form-select').on('change', function (e) {
        var val = $(this).val();
        var content = $(this).find('option[value=' + val + ']').html();
        $(this).next('.form-select-content').val(content);
    })
});
/*
 * ================================================================
 * 审核不通过
 * ================================================================
 */
$(function () {
    $('body').on('click', '.btn-examine-fail', function (e) {
        var $this    = $(this),
            id       = $this.attr('data-id'),
            url      = $this.attr('data-url'),
            form     = $this.attr('data-form'),
            redirect = $this.attr('data-redirect'),
            formData = $('#' + form).serialize();
        formData += ('&id=' + id);
        $.ajax({
            url: url,
            dataType: 'json',
            data: formData,
            success: function (res) {
                if (res.success === '1') {
                    $.toast({
                        type: 'success',
                        message: res.message
                    });
                    window.location.href = redirect;
                } else {
                    $.toast({
                        type: 'error',
                        message: res.message
                    });
                }
            }
        });
    })
});
/*
 * ================================================================
 * 审核通过
 * ================================================================
 */
$(function () {
    $('body').on('click', '.btn-examine-pass', function (e) {
        var $this    = $(this),
            id       = $this.attr('data-id'),
            url      = $this.attr('data-url'),
            form     = $this.attr('data-form'),
            redirect = $this.attr('data-redirect'),
            formData = $('#' + form).serialize();
        formData += ('&id=' + id);
        $.ajax({
            url: url,
            dataType: 'json',
            data: formData,
            success: function (res) {
                if (res.success === '1') {
                    $.toast({
                        type: 'success',
                        message: res.message
                    });
                    window.location.href = redirect;
                } else {
                    $.toast({
                        type: 'error',
                        message: res.message
                    });
                }
            }
        });
    })
});