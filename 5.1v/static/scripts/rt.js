function Save(n, t, i, r) {
    var u = JSON.stringify(n);
    $.ajax({
        url: t,
        type: "POST",
        dataType: "json",
        data: u,
        contentType: "application/json; charset=utf-8",
        success: i,
        error: r
    })
}

function getContent(n, t) {
    var i = new Sys.Net.WebRequest,
        r;
    i.set_url(n), i.set_httpVerb("GET"), r = Function.createCallback(getContentResults, t), i.add_completed(r), i.invoke()
}

function getContentResults(executor, eventArgs, callback) {
    executor.get_responseAvailable() ? callback(eval(executor.get_responseData())) : executor.get_timedOut() ? alert("TIMEOUT") : executor.get_aborted() && alert("ABORT")
}

function bindOptions(n, t, i, r) {
    n.options.length = 0;
    var u = t.value;
    u && getContent(i + u, r)
}

function handleAjaxStatusError(n) {
    var t = n.responseText,
        i = $.parseJSON(t);
    alert(i.message)
}

function updateSysStatus(n) {
    $("#sysinfo-loading").removeClass("hidden"), $.ajax({
        method: "GET",
        url: "/Sysinfo/GetServerStatus",
        global: !1
    }).done(function (t) {
        var u = 30,
            f = 70,
            e = 110,
            i = $(".sysinfo-text", n),
            r = $("#sysinfo-icon", n);
        $("#sysinfo-loading").addClass("hidden"), t > 0 && t <= u ? (r.removeClass().addClass("status_normalus"), i.text("NORMALUS")) : t > u && t <= f ? (r.removeClass().addClass("status_padidejes"), i.text("PADIDĖJĘS")) : t > f && t <= e ? (r.removeClass().addClass("status_didelis"), i.text("DIDELIS")) : t > e ? (r.removeClass().addClass("status_ldidelis"), i.text("LABAI DIDELIS")) : i.hide()
    })
}

function initialize_report() {
    function f(i) {
        r(), i == "p" ? (t.addClass("page-" + n), t.removeClass("page-" + (n + 1))) : (t.addClass("page-" + n), t.removeClass("page-" + (n - 1)))
    }

    function r() {
        u != undefined && c.html(function () {
            return u.replace("{currentPage}", n).replace("{totalPages}", i)
        })
    }
    var u = $("input[id=ImageStatusTemplate]").val(),
        e = $("#ReportImageDiv"),
        o = $("#ReportImageDivMessageDiv"),
        t = $("#ReportImage"),
        s = $("#PreviousImage"),
        h = $("#NextImage"),
        c = $("#ImageStatus"),
        i = 0,
        n = 0,
        l = parseInt($("#ReportPageHeight").val());
    r(), setFooter(), t.load(function () {
        e.length > 0 && (s.click(function (t) {
            t.preventDefault(), n > 1 && (n--, f("p"))
        }), h.click(function (t) {
            t.preventDefault(), n < i && (n++, f("n"))
        }), o.hide(), t.show(), n = 1, i = t.height() / l, r(), setFooter())
    })
}

function symbolsCount(n, t, i) {
    n.keyup(function () {
        var r = $(this).val(),
            e = (r.match(/\n/g) || []).length,
            u = r.length + e,
            f, n;
        if (u > i) {
            for (f = !1, n = 0; !f;) u = r.substring(0, i - n).length + (r.substring(0, i - n).match(/\n/g) || []).length, i >= u ? f = !0 : n = n + 1;
            $(this).val(r.substring(0, i - n))
        }
        t.text(i - u)
    }), n.keyup()
}

function setFooter() {
    var n, t, i;
    return
}

function tamo_get(n, t, i) {
    $.ajax(n, {
        cache: !1,
        data: t,
        type: "GET",
        success: i,
        error: function () {
            $("#loading-dialog").length != 0 && deleLoadingDialog(), alert("apdorojant užklausą įvyko klaida")
        }
    })
}

function tamo_post(n, t, i) {
    $.ajax(n, {
        cache: !1,
        data: t,
        type: "POST",
        success: i,
        error: function () {
            $("#loading-dialog").length != 0 && deleLoadingDialog(), alert("apdorojant užklausą įvyko klaida")
        }
    })
}

function hideSuccessMessage() {
    var n = $(".success_message").parents(".message_to_hide");
    setTimeout(function () {
        n.slideUp("normal", function () {
            setFooter()
        })
    }, 3e3)
}

function append(n, t) {
    n.append(t), setFooter()
}

function show(n) {
    n.show(), setFooter()
}

function hide(n) {
    n.hide(), setFooter()
}

function toggle(n) {
    n.toggle(), setFooter()
}

function remove(n) {
    n.remove(), setFooter()
}

function after(n, t) {
    n.after(t), setFooter()
}

function replace(n, t) {
    n.after(t), n.remove(), setFooter()
}

function getTabIndex() {
    if (navigator.appName != "Microsoft Internet Explorer") {
        var t = window.location.hash.replace("#tabas-", ""),
            n;
        return n = parseInt(t), isNaN(n) && (n = 1), n - 1
    }
    return 0
}

function setTabIndex(n) {
    document.location.replace("#tabas-" + (n + 1))
}

function fixedColumnTable(n, t) {
    var i, r, l, o, s, a, e, u, h, f, c;
    if (!($.browser.msie && parseInt($.browser.version, 10) === 7)) {
        for (i = n, t || (i.addClass("left"), r = i.clone(), r.addClass("left"), i.find("td:not(.fixed), th:not(.fixed), col:not(.fixed)").remove(), r.find("td.fixed, th.fixed, col.fixed").remove()), l = i.find("col"), o = 0, $.each(l, function (n, t) {
                var i = $(t).attr("width");
                o += parseInt(i)
            }), i.css("width", o), t || n.siblings("br.clear").before('<div class="left slider_holder" id="slenkanti_dalis"><\/div>'), t || ($("#slenkanti_dalis").css("width", n.parent().width() - i.outerWidth() - 1), append($("#slenkanti_dalis"), r)), s = i.find("tr"), a = t ? null : r.find("tr"), u = 0; u < s.length; u++) h = $(s.get(u)), e = t ? null : $(a.get(u)), f = h.height(), !t && e.height() > f && (f = e.height()), h.css("height", f), t || e.css("height", f);
        c = n.parent().height(), window.opera && window.opera.buildNumber && (c += 20), $("#slenkanti_dalis").css("height", c), setFooter()
    }
}

function blink(n, t, i, r) {
    var u = n.find("#mirksi").val();
    u == "False" && (n.find("#mirksi").val("True"), n.css("backgroundColor", i), r == null && (r = 1e3), n.animate({
        backgroundColor: t
    }, r, function () {
        n.find("#mirksi").val("False")
    }))
}

function attachElements(n) {
    var t, i, r;
    if (n == undefined && (n = "body"), t = $(n), t != undefined) {
        i = t.find("input[class~=datepicker]"), r = t.find("input[class~=timepicker]"), i.length != 0 && (i.datepicker({
            buttonImage: "/content/img/new/dp_button.png",
            constrainInput: !0,
            dateFormat: "yy-mm-dd",
            onSelect: function () {
                $(this).valid()
            }
        }), i.each(function (n, t) {
            $(t).next(".datepickerButton").click(t, function (n) {
                $(n.data).datepicker("show")
            })
        })), r.length != 0 && r.timepicker({
            showLeadingZero: !1,
            showPeriodLabels: !1,
            hourText: $.timepickerLocalization.hourText,
            minuteText: $.timepickerLocalization.minuteText,
            onSelect: function () {
                $(this).valid()
            },
            rows: 4
        }), r.each(function (n, t) {
            $(t).next("img[class~=timepickerButton]").click(t, function (n) {
                $(n.data).timepicker("show", this)
            })
        }), $("input[class~=deleteItemButton]").click(function () {
            $(this).parent().remove(), setFooter()
        });
        $("a.delete_row_button").on("click", function (n) {
            n.preventDefault(), $(this).parents("tr").remove(), setFooter()
        })
    }
}

function ajaxGetSuApdorojimu(n, t, i, r, u) {
    $.ajax(n, {
        cache: !1,
        data: t,
        success: function (n) {
            apdorotiAjaxAtsakyma(n, r, i, u)
        },
        error: function () {
            var n = {
                SekmingaUzklausa: !1,
                Zinute: i
            };
            apdorotiAjaxAtsakyma(n, null, i)
        }
    })
}

function apdorotiAjaxAtsakyma(n, t, i, r) {
    var f = $(".errorHolder"),
        u, e, o;
    f.empty(), u = $(".successHolder"), u.empty(), n.SekmingaUzklausa == !0 ? (t(n), n.Zinute != null && (u.append('<div class="success_message"><\/div>'), e = u.find("div:first"), e.append("<ul><li>" + n.Zinute + "<\/li><\/ul>"), setTimeout(function () {
        e.slideUp("normal", function () {
            setFooter()
        })
    }, 3e3))) : (n.Zinute || i != null) && (f.append('<div class="validation-summary-errors"><\/div>'), "undefined" == typeof r ? (o = f.find("div:first"), n.Zinute != null ? o.append("<ul><li>" + n.Zinute + "<\/li><\/ul>") : o.append("<ul><li>" + i + "<\/li><\/ul>")) : r(n))
}

function createLoadingDialog() {
    var t = $("#c_main"),
        n;
    t.append('<div id="loading-dialog" title="Vykdoma operacija">'), n = $("#loading-dialog"), n.append('<div class="loading_image">'), n.dialog({
        modal: !0,
        close: function () {
            deleLoadingDialog()
        }
    }), $("#loading-dialog").closest(".ui-dialog").attr("id", "loading-dialog-window")
}

function deleLoadingDialog() {
    $("#loading-dialog").dialog("destroy"), remove($("#loading-dialog"))
}

function showInProgress() {
    $.blockUI({
        message: "<img src='/Content/img/new/icons/owl_gif.gif' style='width:60px;height:60px;'/>",
        centerY: 0,
        css: {
            top: "45%",
            border: "none",
            backgroundColor: "transparent"
        },
        overlayCSS: {
            backgroundColor: "white",
            opacity: .4,
            cursor: "wait"
        }
    })
}

function hideInProgress() {
    $.unblockUI()
}

function initWidgets(n) {
    $(".c_tamo_tabs_ajax", n).tabs(), $.fn.tamoTabs && ($(".c_tamo_tabs").tamoTabs(), $(".c_tamo_section.collapsible").tamoCollapsibleSection(), $(".c_tamo_spinner").tamoSpinner(), $(".c_tamo_context_menu").tamoContextMenu()), $(".datepicker").datepicker({
        constrainInput: !0,
        dateFormat: "yy-mm-dd",
        onSelect: function () {
            $(this).valid()
        }
    }).each(function (n, t) {
        $(t).next(".datepickerButton").click(t, function (n) {
            $(n.data).datepicker("show")
        })
    })
}

function setEilute(n) {
    var t = n.find(".dalykasRadio, .dalykasCheckBox");
    t.length != 0 && (t.is(":checked") ? n.find(".kursasRadio").removeAttr("disabled") : n.find(".kursasRadio").attr("disabled", "disabled")), setValanduInput(n, t), $(".total").text(skaiciuotiValandas($("#plan_table tbody, #plan_table_2m tbody")))
}

function setValanduInput(n, t) {
    var i, r;
    t.length != 0 ? t.is(":checked") ? (i = n.find(".kursasRadio"), i.length != 0 ? i.each(function () {
        $(this).is(":checked") ? setKursoValanduInput(n, $(this).val(), !1) : setKursoValanduInput(n, $(this).val(), !0)
    }) : setKursoValanduInput(n, null, !1)) : n.find(".valanduSkaicius").attr("disabled", "disabled") : (r = n.find(".kursasRadio"), r.length != 0 ? r.each(function () {
        $(this).is(":checked") ? setKursoValanduInput(n, $(this).val(), !1) : setKursoValanduInput(n, $(this).val(), !0)
    }) : setKursoValanduInput(n, null, !1))
}

function setKursoValanduInput(n, t, i) {
    t == null ? i ? n.find(".valanduSkaicius").attr("disabled", "disabled") : n.find(".valanduSkaicius").removeAttr("disabled") : i ? n.find("td.kurs_" + t).find(".valanduSkaicius").attr("disabled", "disabled") : n.find("td.kurs_" + t).find(".valanduSkaicius").removeAttr("disabled")
}

function skaiciuotiValandas(n) {
    var t = new BigDecimal("0");
    return n.find(".valanduSkaicius").not(":disabled").each(function () {
        var n = new BigDecimal($(this).val().replace(",", "."));
        t = t.add(n)
    }), t.toString()
}

function pridetiPlanuPildymoIvykius() {
    $(".valanduSkaicius").on("change", function () {
        $(".total").text(skaiciuotiValandas($("#plan_table tbody, #plan_table_2m tbody")));
        var n = $(this).parents("tr");
        n.find(".dalyko_total:visible").text(skaiciuotiValandas(n))
    });
    $(".dalykasRadio, .dalykasCheckBox").on("change", function () {
        $(this).parents("tbody").find("tr").each(function () {
            setEilute($(this))
        }), $(".total").text(skaiciuotiValandas($("#plan_table tbody, #plan_table_2m tbody")))
    });
    $(".kursasRadio").on("change", function () {
        var t = $(this).val(),
            n = $(this).parents("tr");
        n.find(".empty_cell").remove(), n.find('td[class^="kurs_"]').hide().find("select").attr("disabled", "disabled"), n.find(".kurs_" + t + ", .bendras_stulpelis").show().find("select").removeAttr("disabled"), setEilute(n), $(".total").text(skaiciuotiValandas($("#plan_table tbody, #plan_table_2m tbody")))
    })
}

function inicializuotiPlanuPildyma() {
    $("#plan_table tbody, #plan_table_2m tbody").find("tr").each(function () {
        setEilute($(this))
    }), $(".total").text(skaiciuotiValandas($("#plan_table tbody, #plan_table_2m tbody")))
}
var sortSelect = function (n, t, i) {
        t === "text" && (i === "asc" && ($(n).html($(n).children("option").sort(function (n, t) {
            return $(n).text().toUpperCase() < $(t).text().toUpperCase() ? -1 : 1
        })), $(n).get(0).selectedIndex = 0, e.preventDefault()), i === "desc" && ($(n).html($(n).children("option").sort(function (n, t) {
            return $(t).text().toUpperCase() < $(n).text().toUpperCase() ? -1 : 1
        })), $(n).get(0).selectedIndex = 0, e.preventDefault()))
    },
    tamoModals, isMobile;
(function (n) {
    n.validator.unobtrusive.parseDynamicContent = function (t) {
        n.validator.unobtrusive.parse(t);
        var r = n(t).first().closest("form"),
            i = r.data("unobtrusiveValidation"),
            u = r.validate();
        i != undefined && n.each(i.options.rules, function (t, r) {
            if (u.settings.rules[t] == undefined) {
                var f = {};
                n.extend(f, r), f.messages = i.options.messages[t], n("[name='" + t + "']").rules("add", f)
            } else n.each(r, function (r, f) {
                if (u.settings.rules[t][r] == undefined) {
                    var e = {};
                    e[r] = f, e.messages = i.options.messages[t][r], n("[name='" + t + "']").rules("add", e)
                }
            })
        })
    }
})($), $(document).ready(function () {
        $(".daugiau_autoriu_link_knygu_sarase").on("mouseover", function () {
            var t = $(this).find("#bibliotekosIrasoIdAutoriuPaieskai").val(),
                i = {
                    id: t
                },
                r = $("#baseAddress"),
                u = $(this),
                n = u.closest("tr").find(".daugiauAutoriuContainer");
            n.size() > 0 && $.post(r.val() + "BibliotekosKatalogas/GetDaugiauAutoriu", i, function (t) {
                n.append(t), n.removeClass("daugiauAutoriuContainer").addClass("daugiauAutoriuContainerFull")
            })
        });
        $(document).on("click", ".c_select_box_link", function (n) {
            n.preventDefault();
            var t = $(this).parent(),
                i = $(".c_select_options", t);
            i.hasClass("hidden") ? (i.removeClass("hidden"), t.removeClass("inactive").addClass("active"), t.find(".drop_down_icon").removeClass("fa-caret-down").addClass("fa-caret-up")) : (i.addClass("hidden"), t.removeClass("active").addClass("inactive"), t.find(".drop_down_icon").removeClass("fa-caret-up").addClass("fa-caret-down")), n.stopPropagation()
        });
        $(document).click(function () {
            var t = $(".auto_hide");
            $(".auto_hide").addClass("hidden"), $(".auto_hide_button").removeClass("active").addClass("inactive"), $(".auto_hide_button .drop_down_icon").removeClass("fa-caret-up").addClass("fa-caret-down")
        });
        $("#role_options").on("mouseenter", function () {
            $(this).prop("mouseIsOver", !0)
        });
        $("#role_options").on("mouseleave", function () {
            $(this).prop("mouseIsOver", !1)
        });
        $("#change_role").on("blur", function (n) {
            n.preventDefault(), $("#role_options").prop("mouseIsOver") == !1 && ($("#role_options").addClass("hidden"), $("#h_user2").removeClass("hover"), $(this).removeClass("active").addClass("inactive"))
        });
        $(".select_box .selected").on("click", function (n) {
            n.preventDefault();
            var t = $(this).siblings(".selections");
            t.hasClass("hidden") ? (t.removeClass("hidden").addClass("shown"), $(".selections").prop("mouseIsOver", !1)) : t.hasClass("shown") && t.removeClass("shown").addClass("hidden")
        });
        $(".selections").on("mouseenter", function () {
            $(this).prop("mouseIsOver", !0)
        });
        $(".selections").on("mouseleave", function () {
            $(this).prop("mouseIsOver", !1)
        });
        $(".select_box .selected").on("focusout", function () {
            $(".selections").prop("mouseIsOver") == !1 && $(this).siblings(".selections").removeClass("shown").addClass("hidden")
        });
        $(document).on("click", ".submit_button", function (n) {
            n.preventDefault(), $(this).parents("form").submit()
        });
        $("a.btn").on("click", function (n) {
            n.preventDefault()
        });
        $(".symbol_count_div").each(function () {
            var t = $(this).attr("data-target"),
                i = $(this).closest("form"),
                n;
            n = i == undefined ? $('[name="' + t + '"]') : $(i).find('[name="' + t + '"]'), n != null && symbolsCount(n, $(this), $(this).attr("data-max-count"))
        }), hideSuccessMessage(), attachElements(), setFooter()
    }), $(".disabledMenuLink").click(function (n) {
        n.preventDefault()
    }),
    function (n) {
        n.validator.addMethod("rangeDate", function (t, i, r) {
            try {
                var u = n.datepicker.parseDate("yy-mm-dd", t)
            } catch (f) {
                return !0
            }
            return r.min <= u && u <= r.max
        }), n.validator.unobtrusive.adapters.add("rangedate", ["min", "max"], function (t) {
            var i = {
                min: n.datepicker.parseDate("yy-mm-dd", t.params.min),
                max: n.datepicker.parseDate("yy-mm-dd", t.params.max)
            };
            t.rules.rangeDate = i, t.message && (t.messages.rangeDate = t.message)
        }), n.validator.addMethod("notgreaterdate", function (t, i, r) {
            try {
                var f = n.datepicker.parseDate("yy-mm-dd", t),
                    u = n.datepicker.parseDate("yy-mm-dd", n("#" + r).val());
                if (u == null) return !0
            } catch (e) {
                return !0
            }
            return f > u ? !1 : !0
        }), n.validator.unobtrusive.adapters.addSingleVal("notgreaterdate", "otherproperty"), n.validator.addMethod("badformatdate", function (t) {
            try {
                var u = n.datepicker.parseDate("yy-mm-dd", t)
            } catch (f) {
                return !1
            }
            return !0
        }), n.validator.unobtrusive.adapters.addBool("badformatdate"), n.validator.addMethod("mustbetrue", function (n) {
            try {
                alert(n)
            } catch (r) {
                return !1
            }
            return !0
        }), n.validator.unobtrusive.adapters.addBool("mustbetrue", "required")
    }($),
    function (n) {
        return;
        var t
    }($), $(document).ajaxStart(function () {
        showInProgress()
    }), $(document).ajaxStop(function () {
        hideInProgress()
    }), $(document).ajaxError(function (n, t) {
        switch (t.status) {
            case 401:
                window.location = "/Prisijungimas/Login";
                break;
            case 403:
                showMessage(!1, "Neturite teisės vykdyti šios funkcijos")
        }
    }), $(document).ajaxComplete(function (n, t) {
        var r = t.getResponseHeader("Content-Type"),
            u = r.indexOf("html") > 0;
        u && initWidgets(t.responseText)
    }), $(document).ready(function () {
        initWidgets(document);
        $(document).on("click", ".ui-dialog-content #close", function () {
            $(this).closest(".ui-dialog-content").dialog("close")
        })
    }),
    function () {
        Type.registerNamespace("tamo");
        var n = Sys.UI.DomElement;
        tamo.TamoSubmitFlag = function () {}, tamo.TamoSubmitFlag.prototype = {
            None: 0,
            PreventMultipleFormSubmitting: 1,
            PreventMultipleClicks: 2,
            HasReturnButton: 4,
            HasConfirmationDialog: 8,
            All: 15
        }, tamo.TamoSubmitFlag.position = function (n) {
            return Math.log(n) / Math.LN2
        }, tamo.TamoSubmitFlag.registerEnum("tamo.TamoSubmitFlag", !0), tamo.Submit = function (n) {
            return tamo.Submit.initializeBase(this, [n]), this._loaderUrl = "", this._returnButtonName = "", this._returnUrl = "", this._confirmationMessage = "", this._onFormSubmitting = null, this._onButtonClicked = null, this._on2ndButtonClicked = null, this._isSubmitting = !1, this._clicksCount = 0, this._formUrl = "", this._loader = null, this
        }, tamo.Submit.prototype = {
            initialize: function () {
                var n, r, i, u, t;
                return tamo.Submit.callBaseMethod(this, "initialize"), n = this.get_element(), this._onFormSubmitting = Function.createDelegate(this, this.onFormSubmitting), this._onButtonClicked = Function.createDelegate(this, this.onButtonClicked), $addHandler(this.form(), "submit", this._onFormSubmitting), $addHandler(n, "click", this._onButtonClicked), r = this.isFlag(tamo.TamoSubmitFlag.HasReturnButton), r && (this._formUrl = this.form().getAttribute("action"), i = n.cloneNode(), i.value = this.get_returnButtonName(), n.parentElement.appendChild(i), this._on2ndButtonClicked = Function.createDelegate(this, this.on2ndButtonClicked), $addHandler(i, "click", this._on2ndButtonClicked)), u = Sys.Browser.agent, this._loader = document.createElement("img"), u === Sys.Browser.Firefox && (t = this._loader, t.className = "tamo-submit-loader", t.src = this.get_loaderUrl(), t.style.display = "none", n.parentElement.appendChild(t)), this
            },
            dispose: function () {
                $clearHandlers(this.get_element()), tamo.Submit.callBaseMethod(this, "dispose")
            },
            get_loaderUrl: function () {
                return this._loaderUrl
            },
            set_loaderUrl: function (n) {
                return this._loaderUrl = n, this
            },
            get_returnButtonName: function () {
                return this._returnButtonName
            },
            set_returnButtonName: function (n) {
                return this._returnButtonName = n, this
            },
            get_returnUrl: function () {
                return this._returnUrl
            },
            set_returnUrl: function (n) {
                return this._returnUrl = n, this
            },
            get_confirmationMessage: function () {
                return this._confirmationMessage
            },
            set_confirmationMessage: function (n) {
                return this._confirmationMessage = n, this
            },
            parent: function (n) {
                n = n.toLowerCase();
                for (var t = this.get_element(); t && t.parentElement;) {
                    if (t.tagName.toLowerCase() == n) break;
                    t = t.parentElement
                }
                return t
            },
            form: function () {
                return this.parent("form")
            },
            isFlag: function (n) {
                var t = this.get_element(),
                    i = t.getAttribute("flags"),
                    r = tamo.TamoSubmitFlag.position(n),
                    u = i.substr(r, 1);
                return u === "1"
            },
            onFormSubmitting: function (n) {
                var t, i;
                return (n.stopPropagation(), t = $(this.form()), !t.valid()) ? !1 : (i = this.isFlag(tamo.TamoSubmitFlag.PreventMultipleFormSubmitting), i && this._isSubmitting) ? (n.preventDefault(), !1) : (this._isSubmitting = !0, !0)
            },
            onButtonClicked: function (n) {
                var r = n.target,
                    h = $(this.form()),
                    u, f, t, i, e, o, s;
                if (!h.valid()) return !1;
                if ((u = this.isFlag(tamo.TamoSubmitFlag.HasConfirmationDialog), u && this._clicksCount == 0 && !confirm(this.get_confirmationMessage())) || this._clicksCount == 1 && (f = this.isFlag(tamo.TamoSubmitFlag.PreventMultipleClicks), f)) return n.preventDefault(), !1;
                this._isSubmitting || (Sys.Browser.agent === Sys.Browser.Firefox ? this._loader.style.display = "" : (t = this._loader, t.className = "tamo-submit-loader", t.src = this.get_loaderUrl(), r.parentElement.appendChild(t)), i = document.createElement("span"), i.className = "tamo-submit-message", e = document.createTextNode("Išsaugo duomenis..."), i.appendChild(e), r.parentElement.appendChild(i)), this._clicksCount == 1 && (o = r.parentElement.getElementsByTagName("span")[0], s = o.firstChild, s.nodeValue = "Išsaugo duomenis! Prašome palaukti..."), this._clicksCount++
            },
            on2ndButtonClicked: function (t) {
                this.form().action = this.get_returnUrl(), this._isSubmitting || n.setVisible(this.get_element(), !1);
                return this.onButtonClicked(t)
            }
        }, tamo.Submit.registerClass("tamo.Submit", Sys.UI.Control)
    }(),
    function () {
        Type.registerNamespace("tamo"), tamo.$dom = Sys.UI.DomElement, tamo.$dom.empty === undefined && (tamo.$dom.empty = function (n) {
            while (n.hasChildNodes()) n.removeChild(n.lastChild);
            return this
        }), tamo.Session = function (n) {
            return tamo.Session.initializeBase(this, [n]), this.url = "", this.message = "The session will end in ~{0} minute(s). Press OK to renew, or Cancel to let your session expire.", this.timeoutMins = 10, this.endingMins = 1, this.milliseconds = 0, this._ask = null, this._keepAlive = null, this._onRenew = null, this._tryRenew = null, this._updateTimer = null, this._refresh = null, this._signout = null, this.session_time_left_span = null, this.funcID = 0, this.repeat = 2, this
        }, tamo.Session.prototype = {
            initialize: function () {
                tamo.Session.callBaseMethod(this, "initialize"), this.milliseconds = (this.timeoutMins - this.endingMins) * 6e4, this._ask = Function.createDelegate(this, this.ask), this._keepAlive = Function.createDelegate(this, this.keepAlive), this._onRenew = Function.createDelegate(this, this.onRenew), this._tryRenew = Function.createDelegate(this, this.tryRenew), this._updateTimer = Function.createDelegate(this, this.updateTimer), this._refresh = Function.createDelegate(this, this.refresh), this._signout = Function.createDelegate(this, this.signout), this.funcID = setTimeout(this._ask, this.milliseconds), this.end = new Date, this.end.setMinutes(this.end.getMinutes() + this.timeoutMins), this.counterID = setInterval(this._updateTimer, 500)
            },
            dispose: function () {
                clearInterval(this.counterID), $clearHandlers(this.get_element()), delete this._ask, delete this._keepAlive, delete this._onRenew, delete this._tryRenew, delete this._updateTimer, delete this._refresh, tamo.Session.callBaseMethod(this, "dispose")
            },
            get_url: function () {
                return this.url
            },
            set_url: function (n) {
                return this.url = n, this
            },
            get_message: function () {
                return this.message
            },
            set_message: function (n) {
                return this.message = n, this
            },
            get_timeout: function () {
                return this.timeoutMins
            },
            set_timeout: function (n) {
                return this.timeoutMins = n, this
            },
            get_ending: function () {
                return this.endingMins
            },
            set_ending: function (n) {
                return this.endingMins = n, this
            },
            keepAlive: function () {
                clearInterval(this.funcID), $.post(this.url).done(this._onRenew).fail(this._tryRenew).always(this._updateTimer)
            },
            onRenew: function () {
                this.repeat = 2, this.funcID = setTimeout(this._ask, this.milliseconds), this.end = new Date, this.end.setMinutes(this.end.getMinutes() + this.timeoutMins)
            },
            tryRenew: function () {
                this.repeat--, this.repeat >= 0 ? this.funcID = setTimeout(this._keepAlive, 3e3) : onRenew(null)
            },
            ask_old: function () {
                if (confirm(String.format(this.message, this.endingMins))) this.keepAlive();
                else {
                    clearInterval(this.funcID);
                    var n = this.endingMins * 6e4 + 1e3
                }
            },
            ask: function () {
                var t = String.format(this.message, this.endingMins),
                    i = {
                        dir1: "down",
                        dir2: "right",
                        push: "top",
                        modal: !0
                    },
                    n = this;
                new PNotify({
                    title: "",
                    text: t,
                    icon: "",
                    hide: !1,
                    addclass: "stack-modal session-end",
                    stack: i,
                    confirm: {
                        confirm: !0,
                        buttons: [{
                            text: "Baigti darbą",
                            addClass: "btn-primary",
                            click: function (n) {
                                n.remove(), n.get().trigger("pnotify.cancel", n)
                            }
                        }, {
                            text: "Tęsti darbą",
                            addClass: "btn-secondary",
                            promptTrigger: !0,
                            click: function (n, t) {
                                n.remove(), n.get().trigger("pnotify.confirm", [n, t])
                            }
                        }],
                        align: "center"
                    },
                    buttons: {
                        closer: !1,
                        sticker: !1
                    },
                    history: {
                        history: !0
                    },
                    after_open: function (t) {
                        n.updateTimeLeft(n, t)
                    }
                }).get().on("pnotify.confirm", function () {
                    $(".ui-pnotify-modal-overlay").remove(), n.session_time_left_span = null, n.keepAlive()
                }).on("pnotify.cancel", function () {
                    n._signout()
                })
            },
            updateTimeLeft: function (n) {
                n.session_time_left_span = $("#session_time_left")
            },
            refresh: function () {
                clearInterval(this.funcID), window.location.reload(!0)
            },
            signout: function () {
                window.location = "/Prisijungimas/Atsijungti?se=1"
            },
            updateTimer: function () {
                var t = this.end.getTime() - Date.now(),
                    n, i, r;
                t < 1e3 && (t = 0), n = Math.floor(t / 36e5), n < 0 && (n = 0), t -= n * 36e5, i = Math.floor(t / 6e4), i < 0 && (i = 0), t -= i * 6e4, r = Math.floor(t / 1e3), r < 0 && (r = 0);
                var f = this.get_element(),
                    e = f.firstChild,
                    u = String.format("{0}{1}{2}", n > 0 ? n + ":" : "", (n > 0 && i < 10 ? "0" : "") + i + ":", (r < 10 ? "0" : "") + r);
                return e.nodeValue = u, this.session_time_left_span != null && this.session_time_left_span.html(u), n == 0 && i == 0 && r == 0 && (clearInterval(this.counterID), this._signout()), this
            },
            empty: function () {
                var n = tamo.$dom.empty(this.get_element());
                return this
            }
        }, tamo.Session.registerClass("tamo.Session", Sys.UI.Control)
    }(), Type.registerNamespace("tamo"), tamo.$dom = Sys.UI.DomElement, tamo.Template = function (n, t) {
        var i = tamo.$dom,
            u, r;
        if (!n || typeof n == "string" && n.length == 0) throw Error.argument("element", "element");
        if (!t || typeof t != "string" || t.length == 0) throw Error.argument("binder", "binder");
        return this.element = i.resolveElement(n), this.id = this.element.id, this.binder = t, u = this.element.getElementsByClassName("template")[0], this.node = u.cloneNode(!0), i.removeCssClass(this.node, "template"), this.pattern = this.node.outerHTML, this.properties = this.binder.split(","), this.serializer = new Array(this.properties.length), i.containsCssClass(this.element, "oTemplate") && i.setVisibilityMode(this.element, Sys.UI.VisibilityMode.collapse), r = tamo.Template.Instance, r.push(this), r[this.id] = this, this
    }, tamo.Template.prototype = {
        empty: function () {
            for (var n = this.element; n.hasChildNodes();) n.removeChild(n.lastChild);
            return tamo.$dom.containsCssClass(n, "oTemplate") && tamo.$dom.setVisible(n, !1), this
        },
        render: function (n, t) {
            var i, r, e, o, f, u;
            if (!n || !Array.isInstanceOfType(n)) return this;
            if (t && typeof t == "string" && t.length != 0 || (t = this.binder), i = this.pattern, this.pattern.indexOf('class="template-param"') > 0)
                for (r = /<\w+ class\="template-param">(\{\d+\})<\/\w+>/m; r.test(i);) e = r.exec(i), o = i.replace(r, e[1]), i = o;
            return f = "", this.cache = n, n.forEach(function (n) {
                var u = new Array(this.properties.length + 1);
                u[0] = i, this.currentObj = n, this.properties.forEach(function (t, i) {
                    var r, o = this.serializer[t],
                        e, s, f;
                    if (t.indexOf(":") == -1) r = n[t], o && (r = o.apply(this, [r]));
                    else {
                        for (e = t.split(":"), s = new Array(e.length), f = 0; f < e.length; f++) s[f] = n[e[f]];
                        r = o.apply(this, s)
                    }
                    u[i + 1] = r
                }, this), f += String.format.apply(this, u) + "\n"
            }, this), u = this.element, u.innerHTML = f, tamo.$dom.containsCssClass(u, "oTemplate") && tamo.$dom.setVisible(u, !0), this.cache = n, this
        },
        property: function (n, t) {
            var r = this.properties.indexOf(n),
                i = this.serializer;
            return i[r] = t, i[n] = t, this
        }
    }, tamo.Template.Instance = [], tamo.Template.registerClass("tamo.Template"),
    function (n) {
        n.widget("tamo.tamoTabs", {
            _select_tab: function () {},
            _get_active_tab_key: function () {
                return window.location + "___" + this.uuid
            },
            _item_click: function (t) {
                var f = this,
                    r = this.element,
                    e = r.children(".tab_header"),
                    s = e.find("li.active"),
                    o, u, i;
                s.removeClass("active"), o = t.currentTarget.href, u = t.currentTarget.hash, r.children(".tab_content").addClass("hidden"), n(t.currentTarget.offsetParent).addClass("active"), u === "" ? (i = r.children(".tab_content:not([id])"), !1 == i.hasClass("preloaded") ? (r.children(".tab_content").addClass("hidden"), n.ajax(o, {
                    cache: !1,
                    type: "GET"
                }).done(function (n) {
                    f._trigger("contentLoaded", null, {
                        content: n
                    }), i.html(n), f._trigger("contentUpdated", null, {
                        tab: i
                    })
                }).fail(function () {
                    i.html("Nepavyksta atnaujinti puslapio")
                }).always(function () {
                    i.removeClass("hidden"), n.validator.unobtrusive.parse("form")
                })) : i.removeClass("hidden").removeClass("preloaded")) : r.children(u).removeClass("hidden"), sessionStorage.setItem(this._get_active_tab_key(), e.find("li.active").index()), this._trigger("itemclick", null, {
                    tab_id: n(t.currentTarget.offsetParent).attr("id")
                }), t.preventDefault()
            },
            activateTab: function (n) {
                var i = this.element,
                    t = i.children(".tab_header"),
                    r = t.find("li");
                r.length > n && n >= 0 && (active_link = t.find("li a")[n], active_link.click())
            },
            reloadCurrentTab: function () {
                var n = this.element,
                    t = n.children(".tab_header"),
                    i = t.find("li.active").index();
                this.activateTab(i)
            },
            _create: function () {
                var t = this.element,
                    f, i, u, r;
                t.hasClass("no-ajax") || (f = t.hasClass("with-state"), i = t.children(".tab_header"), t.addClass("tamo-tab"), i.find("li").addClass("tamo-tab-item"), i.find("li >a").addClass("tamo-tab-item_a"), u = t.children(".tab_content"), u.addClass("hidden"), u.each(function (t, i) {
                    i.children.length > 0 && n(i).addClass("preloaded")
                }), this._on(i, {
                    "click a": this._item_click
                }), r = !1, f == !0 && (r = sessionStorage.getItem(this._get_active_tab_key())), r ? this.activateTab(r) : (active_link = i.find("li.active a"), active_link.length > 0 ? active_link.click() : this.activateTab(0)))
            }
        }), n.widget("tamo.tamoCollapsibleSection", {
            _icon_collapsed: "fa-caret-right fa-fw blue",
            _icon_expanded: "fa-caret-down fa-fw blue",
            _url: "",
            _data_load_mode: "",
            _panel_header_click: function (n) {
                var t = this.element,
                    u = t.children(".section_header"),
                    i = t.children(".section_content"),
                    r = u.children("i"),
                    f = t.hasClass("collapsed") ? "" : "collapsed";
                f == "" ? (t.removeClass("collapsed"), this._load_content(), i.toggle("slide", {
                    direction: "up"
                }), r.removeClass(this._icon_collapsed).addClass(this._icon_expanded), this._trigger("expanded", null, {})) : (i.toggle("slide", {
                    direction: "up"
                }), t.addClass("collapsed"), r.removeClass(this._icon_expanded).addClass(this._icon_collapsed), this._trigger("collapsed", null, {})), n.preventDefault()
            },
            _load_content: function () {
                var t = this.element,
                    i = t.data("url"),
                    r = t.data("load-mode"),
                    u;
                i != undefined && r != undefined && (t = this.element, u = t.data("loaded"), r == "onetime" && u == "true" || (n.get(i).success(function (n) {
                    t.children(".section_content").html(n)
                }), t.data("loaded", "true")))
            },
            _create: function () {
                var n = this.element,
                    t = n.children(".section_header"),
                    i = n.children(".section_content"),
                    r = this._icon_expanded;
                n.addClass("tamo-collapsible-section"), n.hasClass("collapsed") ? (i.hide(), r = this._icon_collapsed) : (this._load_content(), i.show()), t.prepend("<i style='vertical-align:baseline;margin-left:0;' class='fa " + r + "'><\/i>"), this._on(t, {
                    click: this._panel_header_click
                })
            }
        }), n.widget("tamo.tamoSpinner", {
            _icon_down: "fa fa-minus",
            _icon_up: "fa fa-plus",
            _step: 1,
            _min_value: 0,
            _max_value: 1e4,
            _mode: "int",
            _get_value: null,
            _parse_int: function (n) {
                var t = parseInt(n);
                return Number.isNaN(t) && (t = this._min_value), t
            },
            _parse_float: function (n) {
                var t = parseFloat(n.replace(",", "."));
                return Number.isNaN(t) && (t = this._min_value), t
            },
            _value_to_string: function (n) {
                return n.toLocaleString("lt-LT")
            },
            _spinner_click: function (t) {
                var i = this.element,
                    u = i[0].value,
                    r;
                i[0].value == "" && (i[0].value = 0), n(t.currentTarget).hasClass("spinner_down") && (r = this._get_value(i[0].value) - this._step, r >= this._min_value && (i[0].value = this._value_to_string(r))), n(t.currentTarget).hasClass("spinner_up") && (r = this._get_value(i[0].value) + this._step, r <= this._max_value && (i[0].value = this._value_to_string(r))), u != i[0].value ? n(i).trigger("change") : t.preventDefault()
            },
            _key_down: function (n) {
                var t = !isNaN(n.key);
                t || n.key == "Enter" || n.key == "Tab" || this._mode == "float" && n.key == "," || n.preventDefault()
            },
            _focus_in: function () {
                var t = this.element;
                t.trigger("select")
            },
            _change: function () {
                var i = this.element,
                    r = i[0].value;
                this._get_value(i[0].value) > this._max_value && (i[0].value = this._max_value), this._get_value(i[0].value) < this._min_value && (i[0].value = this._min_value), i[0].value = this._value_to_string(this._get_value(i[0].value)), i[0].value != r && n(i).trigger("change")
            },
            _create: function () {
                var n = this.element,
                    t;
                n.wrap("<div class='spinner_container'><\/div>"), t = n.parent(), t.append("<a class='c_btn utility spinner_down no-text'><span class='" + this._icon_down + "'><\/span><\/button>"), t.append("<a class='c_btn utility spinner_up no-text'><span class='" + this._icon_up + "'><\/span><\/button>"), this._on(t, {
                    "click .c_btn": this._spinner_click
                }), this._on(t, {
                    "keydown input": this._key_down
                }), this._on(t, {
                    "focusin input": this._focus_in
                }), this._on(t, {
                    "change input": this._change
                }), this._min_value = n.data("min-value") == null ? this._min_value : n.data("min-value"), this._max_value = n.data("max-value") == null ? this._max_value : n.data("max-value"), this._step = n.data("step") == null ? this._step : n.data("step"), this._mode = n.data("mode") == null ? this._mode : n.data("mode"), this._get_value = this._mode == "float" ? this._parse_float : this._parse_int, n[0].value = this._value_to_string(this._get_value(n[0].value))
            }
        }), n.widget("tamo.tamoContextMenu", {
            _menu_expand_collapse: function (n) {
                var i = this,
                    t = this.element;
                t.toggleClass("collapsed expanded"), n.stopPropagation()
            },
            _create: function () {
                var t = this.element,
                    i;
                if (t.addClass("is-tamo-context-menu collapsed"), i = t.children("button"), this._on(i, {
                        click: this._menu_expand_collapse
                    }), t.children("button").addClass("c_btn utility"), !1 == n("body").hasClass("context-menu-autohide")) {
                    n(document).on("click", function () {
                        n(".is-tamo-context-menu").addClass("collapsed").removeClass("expanded")
                    });
                    n("body").addClass("context-menu-autohide")
                }
                t.find(".context_menu_item").length > 0 && t.removeClass("hidden")
            }
        })
    }($),
    function () {
        function n() {
            var n = $(".global_search_button");
            $(".global_search_container").height(n.parent().height()), $(".global_search_container").toggle("slide", {
                direction: "left"
            })
        }

        function t() {
            $("#search_input").length != 0 && $("#search_input").autocomplete({
                minLength: 3,
                delay: 500,
                position: {
                    of: $(".global_search_container")
                },
                source: function (n, t) {
                    $.ajax({
                        url: "/Asmuo/FindAsmenys",
                        data: "raides=" + n.term,
                        type: "GET",
                        dataType: "json",
                        contentType: "application/json; charset=utf-8",
                        success: function (n) {
                            t($.map(n, function (n) {
                                return {
                                    label: n.Pavadinimas + " (" + n.Tipas + ")",
                                    value: n.AsmensId
                                }
                            }));
                            var i = $("ul.ui-autocomplete .ui-menu-item");
                            i.filter(".ui-menu-item:first").addClass("first"), i.filter(".ui-menu-item:last").addClass("last")
                        }
                    })
                },
                focus: function (n, t) {
                    return $("#search_input").val(t.item.label), !1
                },
                select: function (n, t) {
                    var i = t.item.value,
                        r = $(".global_search_button").data("url");
                    return document.location = r.replace("{id}", i), !1
                }
            }), $("#search_input").focus(function () {
                $(this).val() == $(this)[0].defaultValue && $(this).val("")
            }), $("#search_input").focusout(function () {
                $("#search_input").val("Ieškokite vardo arba pavardės")
            })
        }
        $(document).ready(function () {
            $(".global_search_button").click(n), t()
        })
    }(), tamoModals = {
        dialog_element: "#modal_dialog_window",
        _closeCallback: null,
        loadHtmlAndShow: function (n, t, i, r, u, f, e) {
            $(n.dialog_element).html(t), e != undefined && e != null && e(this.dialog_element), $(n.dialog_element).removeClass("hidden"), dialog = $(n.dialog_element).dialog({
                title: i,
                width: u,
                height: f,
                autoOpen: !1,
                dialogClass: "no-close2",
                modal: !0,
                buttons: r
            });
            var s = dialog.dialog("widget"),
                o = s.find(".ui-dialog-titlebar-close");
            o.removeClass().addClass("c_btn secondary right").css("margin-right", "5px"), o.html("<i class='fa fa-icon fa-close fa-2x'><\/i>"), dialog.dialog("open")
        },
        openWindow: function (n, t, i, r, u, f, e, o, s) {
            var h = this,
                c;
            h._closeCallback = s, c = $(this.dialog_element).dialog("instance"), c != undefined && $(this.dialog_element).dialog("destroy"), n == "get" ? $.get(t, i).done(function (n) {
                h.loadHtmlAndShow(h, n, r, u, f, e, o)
            }) : $.post(t, i).done(function (n) {
                h.loadHtmlAndShow(h, n, r, u, f, e, o)
            })
        },
        openStaticWindow: function (n, t, i, r, u, f) {
            var e = this,
                o = $(this.dialog_element).dialog("instance");
            o != undefined && $(this.dialog_element).dialog("destroy"), e.loadHtmlAndShow(e, $(n).html(), t, i, r, u, f)
        },
        closeWindow: function (n) {
            $(this.dialog_element).dialog("close"), this._closeCallback !== null && this._closeCallback !== undefined && this._closeCallback(n)
        }
    }, tamo.behaviors = {
        cloneItemTemplate: function (n) {
            var t = $(n),
                i = t.find(".data-item-template").first().clone().removeClass("hidden").removeClass("data-item-template").addClass("data-item"),
                r = t.find("[data-record-id]").length - 1,
                u = i.find("input,select,textarea");
            u.prop("disabled", null), u.each(function (n, t) {
                t.id = t.id.replace("-1", r), t.setAttribute("name", t.getAttribute("name").replace("-1", r + ""))
            }), t.append(i)
        },
        selectItemInModal: function (n, t, i) {
            var r = $(n).data("record-id"),
                u = $(n).data("record-title");
            $(t).val(r), $(i).html(u), $(tamoModals.dialog_element).dialog("close")
        },
        updateBadge: function (n) {
            var t = n.data("update-url");
            n.html("..."), t && $.ajax({
                method: "get",
                url: t,
                dataType: "json",
                global: !1,
                cache: !1,
                success: function (t) {
                    n.html(t.result), t.result == 0 ? n.addClass("hidden") : n.removeClass("hidden")
                }
            })
        },
        toggleBehavior: function (n, t) {
            t == undefined && (t = n);
            var i = n.data("target"),
                r = n.data("text-visible"),
                u = n.data("text-hidden");
            $(i).hasClass("hidden") ? ($(i).removeClass("hidden"), t.text(r)) : ($(i).addClass("hidden"), t.text(u))
        },
        toggleClassBehavior: function (n) {
            var u = "tb-tc",
                i = n.data(u + "-target"),
                r = n.data(u + "-class-name");
            $(i).hasClass(r) ? $(i).removeClass(r) : $(i).addClass(r)
        },
        modifyClassBehavior: function (n) {
            var i = "tb-cc",
                r = n.data(i + "-target"),
                u = n.data(i + "-add-class-names"),
                f = n.data(i + "-remove-class-names");
            $(r).addClass(u), $(r).removeClass(f)
        },
        loadContentBehavior: function (n) {
            var r = $.Deferred(),
                i = n.data("target"),
                f = n.data("url"),
                u = n.data("load-mode"),
                e = n.data("only-once").toLowerCase() == "true";
            return $(i).hasClass("tb-content-loaded") && e ? r.resolve() : ($(i).addClass("unload"), $.ajax(f, {
                method: "GET",
                cache: !1
            }).done(function (n) {
                u == "content" && $(i).html(n), u == "replace" && $(i).replaceWith(n), u == "prepend" && $(i).prepend(n), u == "append" && $(i).append(n), $.validator.unobtrusive.parse(i), $(i).removeClass("unload"), $(i).addClass("tb-content-loaded"), r.resolve()
            }).fail(function () {
                r.reject()
            })), r.promise()
        },
        singleVisibleBehavior: function (n) {
            var i = "tb-sv",
                r = n.data(i + "-items"),
                u = n.data(i + "-item");
            $(r).addClass("hidden"), $(u).removeClass("hidden")
        },
        singleClassBehavior: function (n) {
            var i = "tb-sc",
                u = n.data(i + "-items"),
                f = n.data(i + "-item"),
                r = n.data(i + "-class");
            $(u).removeClass(r), $(f).addClass(r)
        },
        clearFormBehavior: function (n, t) {
            var u = "tb-cform",
                r = n.data(u + "-selector"),
                i;
            t == undefined && (t = n), i = r == null ? t.parents("form") : $(r), i.find("input,textarea").not("[type='hidden']").each(function (n, t) {
                t.value = "", t.checked = !1
            }), i.find("select").each(function (n, t) {
                $(t).find("option:selected").prop("selected", null), $(t).find("option[value='0']").prop("selected", "selected")
            })
        },
        executeBehavior: function (n) {
            var i = $.Deferred(),
                r = n.data("execute"),
                u = n.data("target");
            return $.post(r, null, function (n) {
                showMessage(n.success, n.message), n.success ? i.resolve() : i.reject()
            }).fail(function () {
                i.reject()
            }), i.promise()
        },
        confirmBehavior: function (n) {
            var i = $.Deferred(),
                r = "tb-confirm",
                u = n.data(r + "-title"),
                f = n.data(r + "-prompt").replace(".", ".<br/><br/>");
            return showConfirmation(u, f, function () {
                i.resolve()
            }, function () {
                i.reject()
            }), i.promise()
        },
        popupBehavior: function (n) {
            var i = $.Deferred(),
                r = n.data("url"),
                u = n.data("content-selector"),
                f = n.data("title"),
                e = n.data("width"),
                o = n.data("target-item-id-selector"),
                s = n.data("target-item-text-selector"),
                h = n.data("on-select-function");
            return r != null ? tamoModals.openWindow("get", r, null, f, null, e, "auto", function (n) {
                if ($.validator.unobtrusive.parse(n), o != null && s != null) {
                    $(n).off("click", "[data-tamo-behavior-element-type='dataItem']");
                    $(n).on("click", "[data-tamo-behavior-element-type='dataItem']", function (n) {
                        n.preventDefault();
                        var t = $(this).data("record-id"),
                            r = $(this).data("record-title");
                        return $(o).val(t), $(s).html(r), tamoModals.closeWindow(), h != null && tamo.custom[h](), i.resolve(), !1
                    })
                }
            }, function (n) {
                n ? i.resolve() : i.reject()
            }) : u != null && tamoModals.openStaticWindow(u, f, null, e, "auto", function (n) {
                $.validator.unobtrusive.parse(n)
            }), i
        },
        openMobilePanelBehavior: function (n) {
            var i = !0,
                r = "tb-mpanel",
                u = n.data(r + "-url");
            return tamoMobile != undefined && tamoMobile.$panelStack != undefined && (i = tamoMobile.$panelStack.mobilePanelStack("openPanel", u, !1)), i
        },
        closeMobilePanelBehavior: function () {
            tamoMobile != undefined && tamoMobile.$panelStack != undefined && tamoMobile.$panelStack.mobilePanelStack("closePanel")
        },
        updateBadgeBehavior: function (n) {
            var f = "tb-ub",
                u = $.Deferred(),
                e = n.data(f + "-badge-id"),
                i = $("#" + e),
                r = n.data(f + "-update-url");
            return r == "" && (r = i.data("update-url")), i.html("..."), r && r != "" ? $.ajax({
                method: "get",
                url: r,
                dataType: "json",
                global: !1,
                cache: !1,
                success: function (n) {
                    i.html(n.result), n.result == 0 ? i.addClass("hidden") : i.removeClass("hidden"), u.resolve()
                }
            }).fail(function () {
                i.html("???"), u.reject()
            }) : u.resolve(), u.promise()
        },
        closePopupBehavior: function (n) {
            if (tamoModals != undefined) {
                var i = n.data("tb-modal-close-success") == "True";
                tamoModals.closeWindow(i)
            }
        },
        ajaxSubmitBehavior: function (n, t) {
            var r = $.Deferred(),
                i, f, s, u, h;
            t == undefined && (t = n), i = t.parents("form"), f = n.data("form-selector"), f != null && (i = $(f));
            var c = i.prop("enctype"),
                e = c == "multipart/form-data",
                o = n.data("response-type");
            return o == null && (o = "html"), s = i.prop("action"), u = null, u = e ? new FormData(i[0]) : i.serialize(), h = n.data("update"), i.validate().form() && $.ajax({
                type: "POST",
                url: s,
                data: u,
                processData: !e,
                contentType: e ? !1 : "application/x-www-form-urlencoded"
            }).done(function (n) {
                o == "html" ? ($(h).html(n), r.resolve(n)) : (showMessage(n.success, n.message), n.success ? r.resolve(n) : r.reject())
            }).fail(function () {
                r.reject()
            }), r.promise()
        },
        removeItemBehavior: function (n, t) {
            t == undefined && (t = n);
            var i = $.Deferred(),
                r = t.parents("[data-tamo-behavior-element-type='dataItem']"),
                u = r.data("record-id"),
                f = r.data("record-title"),
                e = 'Pasirinktas objektas <b>"' + f + '"<\/b> bus pašalintas<br/><br/> Ar tęsti toliau ?';
            return n.data("prompt") != null && (e = n.data("prompt").replace("{title}", '"<b>' + f + '<\/b>"').replace(".", ".<br/><br/>")), showConfirmation("Objekto šalinimas", e, function () {
                var n = $("[data-tamo-behavior-element-type='dataTable']").data("delete-url"),
                    t;
                n = n.indexOf("?") > 0 ? n + "&id=" + u : n + "/" + u, t = n, $.post(t, null, function (n) {
                    showMessage(n.success, n.message), n.success ? (r.remove(), i.resolve()) : i.reject()
                }).fail(function () {
                    i.reject()
                })
            }, null), i.promise()
        },
        _execute_behavior: function (n, t, i) {
            i != undefined && console.log("context = " + i);
            var r = n.data("tamo-behavior"),
                u = tamo.behaviors[r + "Behavior"],
                f = n.children("tamo-success").children("tamo-behavior"),
                e = n.children("tamo-failure").children("tamo-behavior");
            $.when(u(n, t, i)).then(function (n) {
                f.each(function (i, r) {
                    tamo.behaviors._execute_behavior($(r), t, n)
                })
            }, function () {
                e.each(function (n, r) {
                    tamo.behaviors._execute_behavior($(r), t, i)
                })
            })
        },
        executeScriptBehavior: function (n, t) {
            var i = $.Deferred(),
                r = "tb-es",
                u = n.data(r + "-function-name"),
                f = tamo.custom[u],
                e = f(t, n);
            return e ? i.resolve() : i.reject()
        },
        removeDomElementBehavior: function (n) {
            var i = "tb-rdom",
                r = n.data(i + "-target");
            $(r).remove()
        },
        redirectBehavior: function (n, t, i) {
            var u = "tb-r",
                r = n.data(u + "-url");
            return r = tamo.behaviors._resolveFromContext(r, i), window.location.href = r, !0
        },
        reloadCurrentTabBehavior: function (n) {
            var u = "tb-rct",
                r = n.data(u + "-tab-selector"),
                i;
            i = r ? $(r) : n.closest(".tamo-tab"), i.tamoTabs("instance").reloadCurrentTab()
        },
        clearContentBehavior: function (n) {
            var i = "tb-ccn",
                r = n.data(i + "-target");
            $(r).html(null)
        },
        _getObjectProperty: function (n, t) {
            for (var i = t.split("."); i.length && (n = n[i.shift()]););
            return n
        },
        _resolveFromContext: function (n, t) {
            var u = unescape(n),
                e, r, o, f;
            if (t != undefined && t != null && (e = new RegExp(/\{([^}]+)\}/g), r = u.match(e), r != null))
                for (i = 0; i < r.length; i++) o = r[i].replace("{", "").replace("}", ""), f = tamo.behaviors._getObjectProperty(t, o), f && (u = u.replace(r[i], f));
            return u
        }
    },
    function (n) {
        n(function () {
            n(document).on("click", "[data-tamo-behavior]", function (t) {
                return t.preventDefault(), tamo.behaviors._execute_behavior(n(this)), !1
            });
            n(document).on("click", "[data-tamo-behavior-id]", function (t) {
                var u = n(this),
                    r = n("#" + u.data("tamo-behavior-id")),
                    i = [];
                return i = r.is("tamo-behaviors") ? r.children("tamo-behavior") : r, i.length != 0 && i.each(function (t, i) {
                    var r = n(i);
                    tamo.behaviors._execute_behavior(r, u)
                }), t.preventDefault(), !1
            })
        })
    }(jQuery), isMobile = {
        Android: function () {
            return navigator.userAgent.match(/Android/i)
        },
        BlackBerry: function () {
            return navigator.userAgent.match(/BlackBerry/i)
        },
        iOS: function () {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i)
        },
        Opera: function () {
            return navigator.userAgent.match(/Opera Mini/i)
        },
        Windows: function () {
            return navigator.userAgent.match(/IEMobile/i)
        },
        any: function () {
            return isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()
        }
    }, tamo.analytics = {
        averageChart: null,
        calculateSectors: function (n) {
            var s = [],
                l = ["#81C9B9", "#ECF7F5"],
                t = n.size / 2,
                i = 0,
                u = 0,
                f = 0,
                r = 0,
                h = 0,
                e = 0,
                c = 0,
                o = 0;
            return n.sectors.map(function (n, a) {
                i = 360 * n.percentage, aCalc = i > 180 ? 360 - i : i, u = aCalc * Math.PI / 180, f = Math.sqrt(2 * t * t - 2 * t * t * Math.cos(u)), r = aCalc <= 90 ? t * Math.sin(u) : t * Math.sin((180 - aCalc) * Math.PI / 180), h = Math.sqrt(f * f - r * r), c = h, i <= 180 ? (e = t + r, arcSweep = 0) : (e = t - r, arcSweep = 1), s.push({
                    percentage: n.percentage,
                    label: n.label,
                    color: l[a],
                    arcSweep: arcSweep,
                    L: t,
                    X: e,
                    Y: c,
                    R: o
                }), o = o + i
            }), s
        },
        refreshAverageWeeklyWidget: function (n, t) {
            var f = tamo.config.isMobile;
            console.log(f);
            var i = t.map(function (n) {
                    return n.AverageCumulative
                }),
                e = t.map(function (n) {
                    return n.Average
                }),
                o = i.filter(function (n) {
                    return n != null
                }).reduce(function (n, t) {
                    return t > n ? t : n
                }, -1),
                v = i.filter(function (n) {
                    return n != null
                }).reduce(function (n, t) {
                    return t < n ? t : n
                }, 11),
                r = e.filter(function (n) {
                    return n != null
                }).reduce(function (n, t) {
                    return t > n ? t : n
                }, -1),
                u = e.filter(function (n) {
                    return n != null
                }).reduce(function (n, t) {
                    return t < n ? t : n
                }, 11);
            u = u == 11 ? 0 : u, r = r == -1 ? 10 : r;
            var s = i.map(function (n) {
                    return n < o ? "#86B3CB" : "#00b300"
                }),
                c = i.map(function (n) {
                    return n < o ? 3 : 5
                }),
                h = i.map(function (n) {
                    return n < r ? "#83c8b9" : "#00b300"
                }),
                l = i.map(function (n) {
                    return n < r ? 3 : 5
                }),
                a = n.find(".chart")[0];
            this.averageChart != null && this.averageChart.destroy(), this.averageChart = new Chart(a, {
                type: "bar",
                data: {
                    labels: t.map(function (n) {
                        return n.WeekLabel
                    }),
                    datasets: [{
                        type: "line",
                        label: "Bendras vidurkis",
                        data: i,
                        fill: !1,
                        borderColor: "#86B3CB",
                        spanGaps: !0,
                        pointBackgroundColor: s,
                        pointBorderColor: s,
                        pointRadius: c,
                        backgroundColor: "#86B3CB",
                        borderColor: "#86B3CB",
                        borderWidth: 5
                    }, {
                        label: "Per savaitę gautų pažymių vidurkis",
                        data: e,
                        fill: !1,
                        borderColor: "#CCCCCC",
                        spanGaps: !0,
                        pointBackgroundColor: h,
                        pointBorderColor: h,
                        pointRadius: l,
                        backgroundColor: "#CCCCCC",
                        borderColor: "#CCCCCC",
                        showLine: !1,
                        barPercentage: .8
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                suggestedMin: u - .5,
                                suggestedMax: r + .5
                            }
                        }],
                        xAxes: [{
                            barPercentage: .4
                        }]
                    },
                    layout: {
                        padding: {
                            left: f ? 5 : 20,
                            right: f ? 5 : 20
                        }
                    }
                }
            })
        },
        refreshPositionWidget: function (n, t) {
            n.find(".position-element").html(t.Position), n.find(".total-element").html(t.Total)
        },
        refreshCommentsWidget: function (n, t) {
            n.find(".bad-element").html(t.Bad), n.find(".good-element").html(t.Good), n.find(".bad-title").html(t.BadTitle), n.find(".good-title").html(t.GoodTitle)
        },
        refreshAttendanceWidget: function (n, t) {
            n.find(".ratio-element").html(t.AttendanceRatioText), n.find(".total-element").html(t.Total), n.find(".missed-element").html(t.Missed), n.find(".attended-element").html(t.Attended);
            var e = n.data("badge-size"),
                r = n.find(".ratio-indicator").first(),
                u = n.find(".ratio-indicator").last(),
                f = {
                    size: e,
                    sectors: [{
                        percentage: t.AttendanceRatio
                    }, {
                        percentage: 1 - t.AttendanceRatio
                    }]
                },
                i = this.calculateSectors(f);
            t.AttendanceRatio < 1 ? (r.parent().css("display", ""), n.find(".ratio-full").css("display", "none"), f.sectors[0].percentage > .5 ? r.attr("d", "M" + i[0].L + "," + i[0].L + " L" + i[0].L + ",0 A" + i[0].L + "," + i[0].L + " 0 " + i[0].arcSweep + ",1 " + i[0].X + ", " + i[0].Y + " z") : r.attr("d", "M" + i[0].L + "," + i[0].L + " L" + i[0].L + ",0 A" + i[0].L + "," + i[0].L + " 1 0,1 " + i[0].X + ", " + i[0].Y + " z"), r.attr("transform", "rotate(" + i[0].R + ", " + i[0].L + ", " + i[0].L + ")"), f.sectors[1].percentage > .5 ? u.attr("d", "M" + i[1].L + "," + i[1].L + " L" + i[1].L + ",0 A" + i[1].L + "," + i[1].L + " 0 " + i[1].arcSweep + ",1 " + i[1].X + ", " + i[1].Y + " z") : u.attr("d", "M" + i[1].L + "," + i[1].L + " L" + i[1].L + ",0 A" + i[1].L + "," + i[1].L + " 1 0,1 " + i[1].X + ", " + i[1].Y + " z"), u.attr("transform", "rotate(" + i[1].R + ", " + i[1].L + ", " + i[1].L + ")")) : (r.parent().css("display", "none"), n.find(".ratio-full").css("display", ""))
        },
        refreshAverageWidget: function (n, t) {
            var i = t.Average,
                r = t.BadgePrimaryColor;
            n.find(".widget-data-element").html(i.toString().replace(".", ",")), n.find(".average-color").attr("fill", r)
        },
        refreshGenericeWidget: function (n, t) {
            n.find(".widget-data-element").html(t)
        },
        refreshAllAnalyticWidgets: function (n, t) {
            var r = t == undefined ? ".analytic-widget" : t,
                u = $(r, n).not(".noload"),
                f = $("#currentIntervalas", n).val(),
                e = $("#isvestiPazymiai", n).val(),
                o = $("#mokymoLygiuPeriodoId", n).val(),
                i = this;
            u.each(function (n, t) {
                var r = $(t);
                r.addClass("loading"), $.ajax(r.data("tamo-analytics-refresh-url"), {
                    global: !1,
                    method: "POST",
                    data: {
                        Intervalas: f,
                        IsvestiPazymiai: e,
                        mokymoLygiuPeriodoId: o
                    }
                }).done(function (n) {
                    var t = r.data("tamo-analytics-widget-type");
                    switch (t) {
                        case "position":
                            i.refreshPositionWidget(r, n);
                            break;
                        case "average":
                            i.refreshAverageWidget(r, n);
                            break;
                        case "average_weekly":
                            i.refreshAverageWeeklyWidget(r, n);
                            break;
                        case "attendance":
                            i.refreshAttendanceWidget(r, n);
                            break;
                        case "comments":
                            i.refreshCommentsWidget(r, n);
                            break;
                        default:
                            i.refreshGenericeWidget(r, n)
                    }
                    r.find(".loading-animation").attr("dur", "0s"), r.removeClass("loading")
                })
            })
        },
        expandDetails: function () {
            var e = "/Analytics/DalykaiDetaliaiExpanded",
                r = $(this),
                u = r.parent().parent(),
                f = r.data("dalyko-id"),
                o = $("#currentIntervalas").val(),
                i = $("#dalykas_details_" + f);
            r.find(".fa").toggleClass("fa-caret-right").toggleClass("fa-caret-down"), i.toggleClass("hidden"), u.toggleClass("expanded"), $(".dalykas_row.expanded").length > 0 ? ($(".dalykas_row:not(.expanded)").addClass("a_collapsed"), $(".dalykas_row.expanded").removeClass("a_collapsed")) : $(".dalykas_row").removeClass("a_collapsed"), u.hasClass("expanded") && i.hasClass("loaded") == !1 && (i.html("<div style='margin:10px;'>...<\/div>"), $.ajax(e, {
                global: !1,
                method: "POST",
                data: {
                    Intervalas: o,
                    IstaiguDalykaiId: f
                }
            }).done(function (n) {
                i.html(n), i.addClass("loaded")
            }))
        }
    }, tamo.config.isMobile && $(function () {
        $("body").on("click", ".dalykas_header", tamo.analytics.expandDetails);
        $(".date_selector_mobile a").on("click", function () {
            var i = $(this),
                n = i.parents(".analytics-dashboard"),
                t = $("input[name='Intervalas']:checked", n);
            $("#currentIntervalas", n).val(t.data("intervalas")), $("#mokymoLygiuPeriodoId", n).val(t.data("mlp-id")), $("#currentIntervalasTitle", n).html(t.data("intervalasTitle")), tamo.analytics.refreshAllAnalyticWidgets(n)
        });
        $(".analytics-dashboard").each(function (n, t) {
            var i = $(t);
            tamo.analytics.refreshAllAnalyticWidgets(i)
        })
    })