! function(e) {
    var t = {};

    function n(o) {
        if (t[o]) return t[o].exports;
        var a = t[o] = {
            i: o,
            l: !1,
            exports: {}
        };
        return e[o].call(a.exports, a, a.exports, n), a.l = !0, a.exports
    }
    n.m = e, n.c = t, n.d = function(e, t, o) {
        n.o(e, t) || Object.defineProperty(e, t, {
            configurable: !1,
            enumerable: !0,
            get: o
        })
    }, n.n = function(e) {
        var t = e && e.__esModule ? function() {
            return e.default
        } : function() {
            return e
        };
        return n.d(t, "a", t), t
    }, n.o = function(e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.p = "", n(n.s = 43)
}({
    43: function(e, t, n) {
        e.exports = n(44)
    },
    44: function(e, t) {
        var n = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function(e) {
            return typeof e
        } : function(e) {
            return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
        };
        $(document).ready(function() {
                console.log("Message"), $("#accordion").accordion({
                    disabled: !0,
                    animate: !0
                })
            }),
            function(e) {
                function t(e, t) {
                    e.length && (e.html(""), e.append(t), e.show())
                }
                e.each([".taxonomy-america .secondary-content-box.desktop-only-banner.mpu", ".taxonomy-america .top-leaderboard", ".page-america .secondary-content-box.desktop-only-banner.mpu", ".page-america .top-leaderboard"], function(t, n) {
                    e(n).length && e(n).hide()
                });
                t(e(".taxonomy-america .desktop-only-banner.mpu.dianomi-ad-sidebar"), '\x3c!--Smartad # 4309: New Statesman USA - Right Rail 300x600--\x3e<iframe WIDTH="300" HEIGHT="600" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4309"  style="width: 300px; height: 600px; border: none; overflow: hidden;"></iframe>');
                t(e(".page-america .dianomi-ad-1"), '\x3c!--Smartad # 4306: New Statesman USA - In Article - Position 1--\x3e<iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4306"  style="width: 100%; height: 150px; border: none; overflow: hidden;"></iframe>'), t(e(".page-america .dianomi-ad-2"), '\x3c!--Smartad # 4307: New Statesman USA - In Article - Position 2--\x3e<iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4307"  style="width: 100%; height: 150px; border: none; overflow: hidden;"></iframe>'), t(e(".page-america .dianomi-ad-3"), '\x3c!--Smartad # 4308: New Statesman USA - In Article - Position 3--\x3e<iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4308"  style="width: 100%; height: 150px; border: none; overflow: hidden;"></iframe>');
                t(e(".page-america .related-articles.dianomi-sponsored"), '\x3c!--Smartad # 4305: New Statesman USA - Below Article 8 Images--\x3e<iframe WIDTH="1051" HEIGHT="690" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4305"  style="width: 100%; height: 690px; border: none; overflow: hidden;"></iframe>')
            }(jQuery);
        var o = function(e) {
            var t = (e = jQuery)(".tns-modal-wrapper"),
                o = e("body"),
                a = (e(".tns-login"), e(".tns-register"), e(".ev-meter-content"), ""),
                i = !1;

            function r(t) {
                var n = e("body");
                return ["digital-subscriber"].some(function(e) {
                    return t.indexOf(e) >= 0
                }) && (n.hasClass("ev-subbed") || n.addClass("ev-subbed")), t
            }

            function s() {
                var t;
                t = EV.util.getEVSession() ? '<a href="/my-account" class="navLoggedIn">My Account</a>  <a class="navLoggedIn" onclick="javascript:EV.Core.UI.logout();">Log out</a>' : '<button name="login" class="tns-btn tns-login" >Login</button>  <button name="register" class="tns-btn tns-register">Register</button>', e(".tns-evo-profile").html(t), console.log(t)
            }

            function l(t) {
                t || (t = ".tns-modal--paywall");
                e(t + " ng-form[name=evRegistrationForm]").append('<div class="tns-pp ng-scope">By registering, I Agree to the <a href="/terms/" target="_blank">Terms of Service</a> and <a href="/privacy-policy/" target="_blank">Privacy Policy</a></div>')
            }

            function c(e) {
                if (p(), console.log("closing modal"), "paywall" == arguments[1]) a = "paywall";
                else if ("paywallRequireEntitlement" == arguments[1]) a = "paywallRequireEntitlement";
                else if ("paywallNotifier" == arguments[1]) a = "paywallNotifier";
                else {
                    if ("forgotPassword" != arguments[1]) return u(e);
                    a = "forgotPassword"
                }
                return u(e, a)
            }

            function d() {
                t.addClass("tns-modal-active"), o.addClass("tns-modal-active")
            }

            function u(t) {
                d(), "paywall" == arguments[1] ? a = "paywall" : "paywallRequireEntitlement" == arguments[1] ? a = "paywallRequireEntitlement" : "paywallNotifier" == arguments[1] ? (a = "paywallNotifier", o.hasClass("tns-modal-active") && (console.log("testing notifier"), o.removeClass("tns-modal-active"))) : a = "forgotPassword" == arguments[1] ? "forgotPassword" : e(t).attr("name"), e(".tns-modal--" + a).addClass("tns-modal-active"), m()
            }

            function p() {
                var t = e(".tns-modal-active");
                console.log("hiding: "), t && t.removeClass("tns-modal-active"), o.hasClass("tns-modal-active") && o.removeClass("tns-modal-active")
            }

            function v() {
                !0 !== window.isIncognito && p()
            }

            function m() {
                var t;
                1 == arguments.length && "object" === n(arguments[0]) ? t = arguments[0] : 0 == arguments.length && (t = TNS_Data.meter), void 0 != t && (console.log("start render: "), console.log(t.result), console.log("end render"), "REQUIRE_LOGIN" != t.result && void 0 != t.result && "REQUIRE_ENTITLEMENT" != t.result || (e(".tns-ev-close").each(function(n) {
                    "undefined" != t.userProperties.site && "US" == t.userProperties.site ? e(this).parent("a").attr("href", "/us") : e(this).parent("a").attr("href", "/uk")
                }), e(".ev-meter-content").hide()))
            }

            function g(t) {
                e.each(t, function(t, n) {
                    e(n).length && e(n).hide()
                })
            }

            function E() {
                e(".node-type-blogs").prepend('<script type="text/javascript" async="true" src="//fo-api.omnitagjs.com/fo-api/ot.js?Placement=f73945131d2fdd86a659b7a2f02d24b8"><\/script>')
            }

            function f() {
                var t, n = EV.util.isAuthenticatedWithEvolok();
                if (1 == arguments.length ? (t = arguments[0], arguments[0].articleId) : (t = TNS_Data.meter, TNS_Data.articleId), 1 == n) {
                    var o = 'Already a subscriber? <a href="/ev-subscriber" name="my-account" class="tns-goto-myaccount" data-context="paywall">Link your subscription</a><br>';
                    o += 'Problem with your account? <a href="/contact-new-statesman" name="contact-us" class="tns-goto-contactus" data-context="paywall">Contact us</a>', e(".tns-modal--paywall span.tns-right").html(o)
                }
                if (void 0 != t)
                    if ("ALLOW_ACCESS" == t.result)
                        if (e(".ev-meter-content").not(".not-viewable").show(), e(".ev-meter-content").not(".not-viewable").css({
                                visibility: "visible",
                                opacity: "1"
                            }), e(".ev-meter-content.not-viewable").after("<div style='text-align:center;'><p>Please Subscribe to view this article</p></div>"), null !== EV.util.getEVSession())
                            if ($subs = r(t.segments), e.inArray("digital-subscriber", t.segments) >= 0) {
                                g([".article-mpu-1", ".article-mpu-2", ".article-mpu-3", ".article-mpu-5", ".article-mpu-51", ".article-mpu-52", ".secondary-content-box.desktop-banner.mpu", ".dianomi-ad", ".bottom-leaderboard-section"])
                            } else E();
                else E();
                else "REQUIRE_LOGIN" == t.result ? (h(t), c(document.getElementsByClassName("tns-modal--paywall")[0], "paywall")) : "REQUIRE_ENTITLEMENT" == t.result && (h(t), c(document.getElementsByClassName("tns-modal--paywallRequireEntitlement")[0], "paywallRequireEntitlement"))
            }

            function h() {
                1 == arguments.length && "object" === n(arguments[0]) ? (arguments[0], arguments[0].articleId) : (TNS_Data.meter, TNS_Data.articleId)
            }

            function y(e) {
                arguments.length > 1 && "REQUIRE_ENTITLEMENT" === arguments[1] && (document.getElementsByClassName("tns-modal--paywall")[0].className += " modal-ent"), c(document.getElementsByClassName("tns-modal--paywall")[0], "paywall"), h()
            }
            return {
                init: function() {
                    (o.hasClass("node-type-blogs") || o.hasClass("node-type-longread")) && (i = !0), EV.util.getEVSession() || o.hasClass("ev-is-anon") ? EV.util.getEVSession() && (o.addClass("ev-is-loggedin"), o.hasClass("node-type-blogs") || o.hasClass("node-type-longread") || EV.Em.segment("{}", function(e) {
                        r(e.segments)
                    }, function(e) {
                        return e
                    })) : o.addClass("ev-is-anon"), e(".tns-ev-close").on("click", p), e(document).on("click", ".tns-btn", function() {
                        c(this)
                    }), e(document).on("click", ".tns-goto-login", function() {
                        c(this)
                    }), e(".tns-goto-register").on("click", function() {
                        c(this)
                    }), l(".tns-modal--register"), EV.Event.on("ev.registration.loaded", l), s(), e("body.ev-is-loggedin .mobile-login-container .ev-myaccount button.tns-login").on("click", function() {
                        e(this).closest(".ev-myaccount").children(".ev-myaccount-list").toggleClass("show")
                    }), e("body.ev-is-loggedin .mobile-login-container .ev-myaccount").on("blur", function() {
                        e(this).children(".ev-myaccount-list").hasClass("show") && e(this).children(".ev-myaccount-list").removeClass("show")
                    })
                },
                hide: v,
                show: c,
                public_render: function() {
                    p(), v(), 1 == arguments.length ? (f(arguments[0]), m(arguments[0])) : (f(), m("paywall_loggedin"))
                },
                meterCallback: function(t) {
                    var n;
                    return console.log("metering"), TNS_Data.meter = t, !EV.util.getEVSession() && i && 1 == window.isIncognito && (e(".tns-modal--paywall").hasClass("tns-modal-active") || (d(), e(".tns-modal--privateMode").addClass("tns-modal-active")), e(".tns-ev-close").each(function(t) {
                        "undefined" != TNS_Data.meter.userProperties.site && "US" == TNS_Data.meter.userProperties.site ? e(this).parent("a").attr("href", "/us") : e(this).parent("a").attr("href", "/uk")
                    })), "ALLOW_ACCESS" == t.result ? (v(), n = t, e(".ev-meter-content").not(".not-viewable").show(), e(".ev-meter-content").not(".not-viewable").css({
                        visibility: "visible",
                        opacity: "1"
                    }), e(".ev-meter-content.not-viewable").after("<div style='text-align:center;'><p>Please Subscribe to view this article</p></div>"), null !== EV.util.getEVSession() ? ($subs = r(n.segments), e.inArray("digital-subscriber", n.segments) >= 0 ? g([".article-mpu-1", ".article-mpu-2", ".article-mpu-3", ".article-mpu-5", ".article-mpu-51", ".article-mpu-52", ".secondary-content-box.desktop-banner.mpu", ".dianomi-ad", ".bottom-leaderboard-section"]) : E()) : E()) : t.requireEntitlement ? y(t, t.result) : (t.result, y(t, t.result)), TNS_Data.meter
                },
                evProfileload: s
            }
        }();
        (function(e) {
            var t = (e = jQuery)("body"),
                n = !1;

            function a(e) {
                window.location = e
            }

            function i(e) {
                var t, n, o = decodeURIComponent(window.location.search.substring(1)).split("&");
                for (n = 0; n < o.length; n++)
                    if ((t = o[n].split(/=(.+)/))[0] === e) return void 0 === t[1] || t[1]
            }

            function r(n) {
                var r;
                o.evProfileload(), EV.Event.publish(EV.Event.PM_REDIRECT_PRODUCT_PROFILE), t.hasClass("ev-is-anon") && t.removeClass("ev-is-anon"), t.addClass("ev-is-loggedin"), (r = i("return")) ? (a(r), console.log("inside returnUrl")) : i("id") && i("productName") ? (console.log("its sub page!"), console.log(TNS_Data.paymentType), void 0 !== TNS_Data.paymentType && (console.log("trigger payment type change"), e("button.profilepage").length && e("button.profilepage").trigger("click"), EV.Event.publish(EV.Event.PM_PAYMENT_TYPE_ENFORCE, TNS_Data.paymentType))) : i("register") ? window.location.href = "/my-account" : window.location.reload(), o.hide()
            }

            function s() {
                alert("Reset Password is Successful");
                window.location.origin;
                a("/")
            }

            function l(e) {
                console.log("Login Failed!"), console.log(e)
            }

            function c(e) {
                i("return") ? EV.Event.publish(EV.Event.LOGIN_SUCCESS) : i("id") && i("productName") ? EV.Event.publish(EV.Event.LOGIN_SUCCESS) : i("register") && EV.Event.publish(EV.Event.LOGIN_SUCCESS), o.hide(), console.log("registraion Success")
            }

            function d(e) {
                console.log("Your are Already Registerd with this credentials")
            }

            function u() {
                e("ev-profile .tns-checking-profile").removeClass("tns-checking-profile"), EV.util.getEVSession() ? t.addClass("ev-is-active ev-is-loggedin") : t.addClass("ev-is-active ev-is-anon"), console.log("Ev ready!")
            }

            function p() {
                var t = i("return");
                t ? a(t) : i("id") && i("productName") ? (window.location.reload(), TNS_Data.paymentType ? (e("#accordion").trigger("editSection:error", "#accordion .step-1-1"), e("#accordion").accordion("option", "active", 1)) : (e("#accordion").trigger("editSection:error", "#accordion .step-1-1"), e("#accordion").accordion("option", "active", 0))) : window.location.reload()
            }

            function v(t) {
                t.error && ("ATTRIBUTE_REQUIRED" !== t.error.code && "REQUIRED_ATTRIBUTE_MISSING" !== t.error.code && "USER_NOT_REGISTERED" !== t.error.code && "USER_PROFILE_NOT_FOUND" !== t.error.code || o.show(e(".tns-modal--sociallogin")))
            }
            return EV.Event.on(EV.Event.PM_PAYMENT_TYPE_ENFORCE, function(e) {
                console.log("enforce triggered: " + e)
            }), e("#product-print_digital_bundle button").click(function() {
                console.log("btn clicked")
            }), {
                init: function() {
                    function t(t, n, o) {
                        0 == e(t + " .top-validation").length && e(t).prepend('<div class="ev top-validation"><p class="alert alert-danger center">' + o + "</p></div>"), e("#accordion").trigger("editSection:error", n)
                    }

                    function a() {
                        e(".top-validation").length > 0 && e(".top-validation").remove()
                    }

                    function i(t) {
                        var n = !1,
                            o = /^.{1,255}$/;
                        return e.each(t, function(t, a) {
                            void 0 === e(t).val() || (!e(t).val() || !1 === o.test(e(t).val()) && void 0 !== e(t).val() ? (0 == e(t).parent().next(".validation").length && e(t).parent().after("<div class='validation col-sm-9'>" + a + "</div>"), n = !0) : e(t).parent().next(".validation").remove())
                        }), n
                    }

                    function m(t) {
                        0 == e(t + " .edit-section").length && e(t).append('<button class="edit-section" style="float: right; font-size: 1em;"> edit </button>')
                    }
                    EV.Event.on("login.success", r), EV.Event.on("social-login.success", r), EV.Event.on("login.failed", l), EV.Event.on("registration.success", c), EV.Event.on("social-register.success", c), EV.Event.on("registration.failed", d), EV.Event.on("event_to_listen", u), EV.Event.on("logout.action", p), EV.Event.on(EV.Event.SOCIAL_LOGIN_FAILED, v), EV.Event.on(EV.Event.SOCIAL_REGISTER_FAILED, v), EV.Event.on("reset-password.success", s), EV.Event.on("login_loaded", function() {
                        e('ev-login button[type="submit"]').removeAttr("disabled")
                    }), EV.Event.publish(EV.Event.PM_PAYMENT_TYPE_ENFORCE, null), EV.Event.on(EV.Event.PM_PRODUCTS_LOADED, function(t) {
                        setTimeout(function() {
                            e('.subspage ev-product-selection div[ng-if="orderTypeOption"]').length > 0 && e('.subspage ev-product-selection div[ng-if="orderTypeOption"]').appendTo(".subspage ev-product-selection .product-footer").css("display", "flex"), e(".subspage ev-product-selection .product-features").appendTo(".subspage ev-product-selection .product-header"), e(".svg-snowscene").length > 0 && e(".svg-snowscene").prependTo(".subspage ev-product-selection .product-image").css({
                                top: "inherit",
                                width: "40%"
                            })
                        }, 100)
                    }), e("ev-product-profile").on("click focus", ".personal-details input", function() {
                        null !== EV.util.getEVSession() && e("ev-product-profile .personal-details input").prop("readonly", !0)
                    }), EV.Event.on(EV.Event.PM_PAYMENT_SUCCESS, function() {}), EV.Event.on(EV.Event.PM_ERROR, function(e) {
                        console.error("PM Error:", e), "NO_PRODUCT_SELECTED" == e.code && (t("#accordion .step-1-2", "#accordion .step-1-1", "Please choose a plan"), console.log("Please select a plan"))
                    }), e('ev-registration button[type="submit"]').live("click", function() {
                        var t = e(this).closest("ev-registration"),
                            n = t.find("input[type|='email']"),
                            o = t.find("input[name|='password']"),
                            a = t.find("input[name|='confirm_password']"),
                            i = t.find("input[name|='first_name']"),
                            r = t.find("input[name|='last_name']");
                        if (n.val()) {
                            n.parent().next(".rvalidation").remove();
                            var s = n.val();
                            /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(s) ? (console.log("ifchecked"), n.parent().next(".rvalidation").remove()) : 0 == n.parent().next(".rvalidation").length && (console.log("else checked"), n.parent().after("<div class='rvalidation col-sm-12'>Please enter valid email address</div>"))
                        } else 0 == n.parent().next(".rvalidation").length && n.parent().after("<div class='rvalidation col-sm-12'>Please enter valid email address</div>");
                        o.val() ? o.parent().next(".rvalidation").remove() : 0 == o.parent().next(".rvalidation").length && o.parent().after("<div class='rvalidation col-sm-12'>Please enter password</div>"), a.val() ? a.val() != o.val() ? 0 !== a.val() && (a.parent().next(".rvalidation").remove(), console.log("Password is not matching"), a.parent().after("<div class='rvalidation col-sm-12'>Your password and confirmation password does not match</div>")) : (a.parent().next(".rvalidation").remove(), console.log("removed")) : 0 == a.parent().next(".rvalidation").length && a.parent().after("<div class='rvalidation col-sm-12'>Please enter confirm password</div>"), i.val() ? i.val().length < 2 ? 0 == i.parent().next(".rvalidation").length && i.parent().after("<div class='rvalidation col-sm-12'>Please enter minimum 2 characters in first name</div>") : i.parent().next(".rvalidation").remove() : 0 == i.parent().next(".rvalidation").length && i.parent().after("<div class='rvalidation col-sm-12'>Please enter valid first name</div>"), r.val() ? r.val().length < 2 ? 0 == r.parent().next(".rvalidation").length && r.parent().after("<div class='rvalidation col-sm-12'>Please enter minimum 2 characters in last name</div>") : r.parent().next(".rvalidation").remove() : 0 == r.parent().next(".rvalidation").length && r.parent().after("<div class='rvalidation col-sm-12'>Please enter valid last name</div>")
                    }), e("#accordion").on("click", "button.product-profile-submit-btn", function(t) {
                        for (var n, o = !1, a = {
                                "#personal-details-first_name": "Please enter valid first name",
                                "#personal-details-last_name": "Please enter valid last name",
                                "#billing-address-street": "Please enter street name",
                                "#billing-address-city": "Please enter city name",
                                "#billing-address-postcode": "Please enter postcode",
                                "#billing-address-street2": "Please enter street name",
                                "#billing-address-city2": "Please enter city name",
                                "#billing-address-postcode2": "Please enter postcode",
                                "#billing-address-country": "Please select country",
                                "#billing-address-country2": "Please select country"
                            }, r = {
                                "#delivery-address-street2": "Please enter street name",
                                "#delivery-address-city2": "Please enter city name",
                                "#delivery-address-postcode2": "Please enter postcode",
                                "#delivery-address-street": "Please enter street name",
                                "#delivery-address-city": "Please enter city name",
                                "#delivery-address-postcode": "Please enter postcode",
                                "#delivery-address-country": "Please select country",
                                "#delivery-address-country2": "Please select country",
                                ".delivery-address .select-address select.form-control": "Please enter valid billing address and click submit"
                            }, s = 1; s <= 10; s++) a["#billing-address-address" + s + "_first_name"] = "Please enter valid first name", a["#billing-address-address" + s + "_last_name"] = "Please enter valid last name", a["#billing-address-address" + s + "_1"] = "Please enter address line 1", a["#billing-address-address" + s + "_city"] = "Please enter city name", a["#billing-address-address" + s + "_postcode"] = "Please enter postcode", r["#delivery-address-address" + s + "_first_name"] = "Please enter valid first name", r["#delivery-address-address" + s + "_last_name"] = "Please enter valid last name", r["#delivery-address-address" + s + "_1"] = "Please enter address line 1", r["#delivery-address-address" + s + "_city"] = "Please enter city name", r["#delivery-address-address" + s + "_postcode"] = "Please enter postcode", a["#billing-address-address" + s + "_country"] = "Please select country", r["#delivery-address-address" + s + "_country"] = "Please select country";
                        if (t.stopPropagation(), n = i(a), e(".delivery-address.profile-section input[type=checkbox]").hasClass("ng-not-empty") || (o = i(r)), !0 !== n && !0 !== o) return !0;
                        t.preventDefault(), e("#auth-register-confirm_password").val() ? e("#auth-register-confirm_password").val() != e("#auth-register-password").val() ? 0 !== e("#auth-register-confirm_password").val() && (e("#auth-register-confirm_password").parent().next(".validation").remove(), console.log("Password is not matching"), e("#auth-register-confirm_password").parent().after("<div class='validation col-sm-9'>Password is not matching</div>")) : e("#auth-register-confirm_password").parent().next(".validation").remove() : (e("#auth-register-confirm_password").parent().next(".validation").remove(), e("#auth-register-confirm_password").parent().after("<div class='validation col-sm-9'>Please enter confirm password</div>"))
                    }), e("ev-product-profile button").live("click", function() {
                        console.log("please wait!!")
                    }), EV.Event.on(EV.Event.SESSION_REFRESH, function() {
                        null !== EV.util.getEVSession() && console.log("Session is refereshed")
                    }), EV.Event.on(EV.Event.PM_REDIRECT_TO_LOGIN, function() {
                        window.location.href, console.log("login now!"), e(".pp_summary").hide(), e(".sublogin").show()
                    }), EV.Event.on(EV.Event.PM_PRODUCTS_SELECTED, function(t) {
                        console.log("Product selected"),
                            function(t) {
                                var n = ["print_12for12_quarterly", "print_digital_12for12_", "12for12_digital", "print_12for12_quarterly_new", "12for12_digital_new", "print_digital_12for12_new", "insert_print_only_12for12"].concat(["12for12_print_only_student", "print_digital_student_12for12", "12for12_digital_student"]);
                                try {
                                    (Array.isArray(TNS_Data.ddPlans) || 0 != TNS_Data.ddPlans.length) && (n = n.concat(TNS_Data.ddPlans))
                                } catch (e) {
                                    console.log("DD plan error")
                                } - 1 !== e.inArray(t, n) ? (e("ev-stripe").css("display", "none"), e("ev-request-directdebit-mandate").css("display", "block"), EV.Event.publish(EV.Event.PM_PAYMENT_TYPE_ENFORCE, EV.Event.PM_PAYMENT_TYPE.DIRECT_DEBIT), TNS_Data.paymentType = EV.Event.PM_PAYMENT_TYPE.DIRECT_DEBIT) : (e("ev-stripe").css("display", "block"), e("ev-request-directdebit-mandate").css("display", "none"), EV.Event.publish(EV.Event.PM_PAYMENT_TYPE_ENFORCE, EV.Event.PM_PAYMENT_TYPE.CARD), TNS_Data.paymentType = EV.Event.PM_PAYMENT_TYPE.CARD)
                            }(t[0].paymentPlan.name), e("#accordion").accordion("option", "active", 1), a(), n = !1, m("#accordion .step-1-1")
                    }), EV.Event.on(EV.Event.PM_REDIRECT_ORDER_SUMMARY, function() {
                        0 == n && (e("ev-product-profile ~ .loading").css("display", "block"), e(".subspage .edit-section").hide(), EV.Event.publish(EV.Event.PM_PROCESS_ORDER), e("ev-product-profile .product-profile-submit-btn").css("display", "none"))
                    }), EV.Event.on(EV.Event.EDIT_PROFILE_COMPLETE_SUCCESS, function(event) {
                        n = !1, console.log("Edit profile Success")
                        console.log(i("productName"))
                        // if(i("productName") == "Free_Trial_digital_"){
                        //     alter('Thank you! We hope you enjoy your free trial to the New Statesman.')
                        //     window.location.href = "/"
                        // }
                    }), EV.Event.on(EV.Event.PM_CREATE_ORDER_SUCCESS, function() {
                        e("#accordion").accordion("option", "active", 3), n = !0, e("ev-product-profile .product-profile-submit-btn").css("display", "block"), e("ev-product-profile ~ .loading").css("display", "none"), e(".subspage .edit-section").show(), m("#accordion .step-3-1")
                    }), EV.Event.on(EV.Event.PM_PAYMENT_SUCCESS, function() {
                        window.location.href;
                        var e = function(e) {
                            for (var t = e + "=", n = decodeURIComponent(document.cookie).split(";"), o = 0; o < n.length; o++) {
                                for (var a = n[o];
                                    " " == a.charAt(0);) a = a.substring(1);
                                if (0 == a.indexOf(t)) return a.substring(t.length, a.length)
                            }
                            return ""
                        }("subsRefererPage");
                        e ? (document.cookie = "subsRefererPage=; expires=Thu, 01 Jan 1970 00:00:01 GMT;", window.location.href = e) : window.location.href = "/"
                    }), e("#accordion").on("click", ".profilepage", function(n) {
                        null !== EV.util.getEVSession() ? (EV.Event.publish(EV.Event.PM_REDIRECT_PRODUCT_PROFILE), e("#accordion").accordion("option", "active", 2), a(), m("#accordion .step-2-1")) : (console.log("Please login to proceed"), t("#accordion .step-2-2", "#accordion .step-2-1", "Please login or register to proceed"))
                    }), e("#accordion").on("click", ".edit-section", function(t) {
                        e(this).closest("h3").nextAll().children(".edit-section").remove()
                    }), e(".paymentepage").live("click", function(t) {
                        e("#ui-id-5").removeClass("ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active").addClass("ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all"), e("#ui-id-6").removeClass("ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active").addClass("ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content").hide(), e("#ui-id-7").removeClass("ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all").addClass("ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active"), e("#ui-id-8").removeClass("ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content").addClass("ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active").show()
                    }), o.init(), EV.Event.on("ev.notifier.opened", function() {
                        console.log("notifier on!"), (1 != window.isIncognito || EV.util.getEVSession()) && o.show(".tns-modal--paywallNotifier", "paywallNotifier")
                    }), TNS_Data.auth.handleMeteringSuccess = function(e) {
                        o.meterCallback(e)
                    }, TNS_Data.auth.handleMeteringError = function(e) {
                        console.log("oops, the meter broke!")
                    }, TNS_Data.auth.init = function(e) {
                        var t = "";
                        if (EV.util.getEVSession()) return t = JSON.stringify(e), EV.Em.authorize(t, TNS_Data.auth.handleMeteringSuccess, TNS_Data.auth.handleMeteringError);
                        EV.Dab.detectPrivateMode().then(function(n) {
                            window.isIncognito = n, e.incognito_notifier = n, t = JSON.stringify(e), EV.Em.authorize(t, TNS_Data.auth.handleMeteringSuccess, TNS_Data.auth.handleMeteringError)
                        }).catch(function(n) {
                            console.log("incognito failed ", n), t = JSON.stringify(e), EV.Em.authorize(t, TNS_Data.auth.handleMeteringSuccess, TNS_Data.auth.handleMeteringError)
                        })
                    }, e("#accordion").on("editSection:error", function(t, n) {
                        var o = parseInt(e(n).attr("tns-data"));
                        o >= 0 && o <= 3 && e("#accordion .edit-section").each(function(t) {
                            $cActive = parseInt(e(this).parent().attr("tns-data")), $cActive !== o && $cActive > o && e(this).remove()
                        })
                    }), e("#accordion").on("click", ".edit-section", function() {
                        e("#accordion").accordion("option", "active", parseInt(e(this).parent().attr("tns-data")))
                    })
                },
                getUrlParameter: i
            }
        })().init(), window.addEventListener("load", function() {
            null != document.getElementById("auth-register-email_address") && null != document.getElementById("auth-register-password") && null != document.getElementById("auth-register-confirm_password") && (document.getElementById("auth-register-email_address").placeholder = "Email Address", document.getElementById("auth-register-password").placeholder = "Password", document.getElementById("auth-register-confirm_password").placeholder = "Confirm password")
        })
    }
});