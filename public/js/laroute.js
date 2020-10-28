(function () {

    var laroute = (function () {

        var routes = {

            absolute: false,
            rootUrl: 'http://localhost',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login.get","action":"App\Http\Controllers\Backend\AdminController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Backend\AdminController@logout"},{"host":null,"methods":["POST"],"uri":"login","name":"login","action":"App\Http\Controllers\Backend\AdminController@post_login"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"frontend.index","action":"App\Http\Controllers\Frontend\FrontendController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/shop","name":"product.shop","action":"App\Http\Controllers\Frontend\Product\ProductController@shop"},{"host":null,"methods":["POST"],"uri":"products\/shop","name":"product.range","action":"App\Http\Controllers\Frontend\Product\ProductController@shop"},{"host":null,"methods":["GET","HEAD"],"uri":"products\/{slug}.html","name":"product.detail","action":"App\Http\Controllers\Frontend\Product\ProductController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"cart","name":"cart","action":"App\Http\Controllers\Frontend\Cart\CartController@cart"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/checkout","name":"checkout","action":"App\Http\Controllers\Frontend\Cart\CartController@checkout"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/update\/{id}\/{qty}","name":"update.cart","action":"App\Http\Controllers\Frontend\Cart\CartController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/delete\/{id}","name":"delete.cart","action":"App\Http\Controllers\Frontend\Cart\CartController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/complete","name":"complete","action":"App\Http\Controllers\Frontend\Cart\CartController@complete"},{"host":null,"methods":["POST"],"uri":"cart\/create","name":"create.cart","action":"App\Http\Controllers\Frontend\Cart\CartController@create"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/create","name":"create.cart","action":"App\Http\Controllers\Frontend\Cart\CartController@create"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/success","name":"success.cart","action":"App\Http\Controllers\Frontend\Cart\CartController@success"},{"host":null,"methods":["POST"],"uri":"cart\/success","name":"success.cart","action":"App\Http\Controllers\Frontend\Cart\CartController@success"},{"host":null,"methods":["GET","HEAD"],"uri":"about","name":"about","action":"App\Http\Controllers\Frontend\FrontendController@about"},{"host":null,"methods":["GET","HEAD"],"uri":"contact","name":"contact","action":"App\Http\Controllers\Frontend\FrontendController@contact"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.index","action":"App\Http\Controllers\Backend\AdminController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/products","name":"product.index","action":"App\Http\Controllers\Backend\Product\ProductController@all"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/products\/create","name":"product.create","action":"App\Http\Controllers\Backend\Product\ProductController@create"},{"host":null,"methods":["POST"],"uri":"admin\/products\/store","name":"product.store","action":"App\Http\Controllers\Backend\Product\ProductController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/products\/edit\/{id}","name":"product.edit","action":"App\Http\Controllers\Backend\Product\ProductController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/products\/save\/{id}","name":"product.save","action":"App\Http\Controllers\Backend\Product\ProductController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/products\/del\/{id}","name":"product.del","action":"App\Http\Controllers\Backend\Product\ProductController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/products\/status\/{id}","name":"product.status","action":"App\Http\Controllers\Backend\Product\ProductController@status"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories","name":"category.index","action":"App\Http\Controllers\Backend\Category\CategoryController@all"},{"host":null,"methods":["POST"],"uri":"admin\/categories\/create","name":"category.create","action":"App\Http\Controllers\Backend\Category\CategoryController@create"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories\/edit\/{id}","name":"category.edit","action":"App\Http\Controllers\Backend\Category\CategoryController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/categories\/edit\/{id}","name":"category.save","action":"App\Http\Controllers\Backend\Category\CategoryController@save"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/categories\/del\/{id}","name":"category.del","action":"App\Http\Controllers\Backend\Category\CategoryController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/users","name":"user.index","action":"App\Http\Controllers\Backend\User\UserController@all"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/users\/create","name":"user.create","action":"App\Http\Controllers\Backend\User\UserController@create"},{"host":null,"methods":["POST"],"uri":"admin\/users\/store","name":"user.store","action":"App\Http\Controllers\Backend\User\UserController@store"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/users\/edit\/{id}","name":"user.edit","action":"App\Http\Controllers\Backend\User\UserController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/users\/update\/{id}","name":"user.update","action":"App\Http\Controllers\Backend\User\UserController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/users\/del\/{id}","name":"user.del","action":"App\Http\Controllers\Backend\User\UserController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/orders","name":"order.index","action":"App\Http\Controllers\Backend\Order\OrderController@orders"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/orders\/detail\/{id}","name":"order.detail","action":"App\Http\Controllers\Backend\Order\OrderController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/orders\/process","name":"order.process","action":"App\Http\Controllers\Backend\Order\OrderController@process"},{"host":null,"methods":["POST"],"uri":"admin\/orders\/process\/{id}","name":"order.status","action":"App\Http\Controllers\Backend\Order\OrderController@status"},{"host":null,"methods":["POST"],"uri":"ajax","name":"ajax","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"view","name":"view","action":"\Illuminate\Routing\ViewController"},{"host":null,"methods":["GET","HEAD"],"uri":"users\/{id?}","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"throttle","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"rq","name":"rq","action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"set-cookie","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"rm-cookie","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"get-cookie","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"json","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"ss-get","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"ss-put","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"ss-delete","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"ss-pull","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"abort","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"date","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"collec","name":null,"action":"App\Http\Controllers\Controller@index"},{"host":null,"methods":["GET","HEAD"],"uri":"bind","name":null,"action":"App\Http\Controllers\Controller@bind"},{"host":null,"methods":["GET","HEAD"],"uri":"event","name":null,"action":"App\Http\Controllers\Controller@event"},{"host":null,"methods":["GET","HEAD"],"uri":"job","name":null,"action":"App\Http\Controllers\Controller@job"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

