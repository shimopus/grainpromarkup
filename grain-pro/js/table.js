(function ($, undefined) {
    var imgLoader = $("img.gn-loader"),
        tableError = $("jsTableError"),
        hiddenClass = hiddenClass;

    activateYaMetrica();
    appendStationSelector();

    var currentCarouselId = location.hash ? location.hash.match(/.*\/(\d+)\/carousel/) : null;
    currentCarouselId = currentCarouselId ? currentCarouselId[1] : null;
    var currentCardId = location.hash ? location.hash.match(/.*\/(\d+)\/card/) : null;
    currentCardId = currentCardId ? currentCardId[1] : null;

    function reloadTable(code) {
        var tableContent = $("div.jsTableContent");

        var params = null;
        if (code) {
            params = {code: code};
        }

        imgLoader.toggleClass(hiddenClass);
        $(".jsTable").remove();
        tableError.removeClass(hiddenClass).addClass(hiddenClass);

        $.get("https://grainpro.herokuapp.com/pages/market-table/site", $.extend(params, {bidType: $bidType, v: "2"}))
            .done(function (data) {
                imgLoader.toggleClass(hiddenClass);
                tableContent.append(data);

                activateYaMetrica();
                filterTableByClass(filterClass);
            })
            .fail(function () {
                imgLoader.toggleClass(hiddenClass);
                tableError.removeClass(hiddenClass);
            });
    }

    function appendStationSelector() {
        var stationSelector = $("input.jsStationsAutocomplete");

        stationSelector.autocomplete({
            source: function (request, response) {
                $.getJSON("https://grainpro.herokuapp.com/api/_search/stations", {
                    query: request.term
                }, function (data) {
                    response(modifyData(data));
                });
            },
            minLength: 2,
            select: function (event, ui) {
                console.log("Selected: " + ui.item.value + " aka " + ui.item.id);
                reloadTable(ui.item.id);
            }
        });

        $(".gn-input__clear").click(function () {
            stationSelector.val("");
            reloadTable();
        });

        var currentValue = stationSelector.val();

        //if selector had a value (user comes on the page with the parameter "code"
        // we need to change it based on the suggestions.
        if (currentValue) {
            $.getJSON("https://grainpro.herokuapp.com/api/_search/stations", {
                query: currentValue
            }, function (data) {
                if (data && data.length && data.length == 1) {
                    stationSelector.val(data[0].name);
                } else {
                    stationSelector.val("");
                }
            });
        }
    }

    function modifyData(data) {
        return data.map(function (station) {
            return {value: station.name, id: station.code};
        });
    }

    function activateYaMetrica() {
        $("[data-fancybox][data-type='image']").on('click', function () {
            var image = $(this);
            fireAnalyticsEvent("TARGET_DOWNLOAD_BUY", {
                params: {
                    qualityPassport: image.attr("data-src").split("/").pop()
                }
            });
        });

        $("[data-fancybox][data-src^='#']").on('click', function () {
            var partner = $(this);
            fireAnalyticsEvent("TARGET_PARTNER_BUY", {
                partner: partner.text()
            });
        });

        $("input.jsStationsAutocomplete").on("autocompleteselect", function (event, ui) {
            fireAnalyticsEvent("TARGET_STATION_BUY", {
                station: ui.item.label + "(" + ui.item.value + ")"
            });
        });
    }

    function param(name) {
        return (location.search.split(name + '=')[1] || '').split('&')[0];
    }

    $(document).ready(function () {
        if (param("from") === "email") {
            $(window).load(function () {
                fireAnalyticsEvent("TARGET_FROM_EMAIL_BUY");
            });
        }

        if (currentCarouselId) {
            $("#" + currentCarouselId).click();
            currentCarouselId = null;
        }
        if (currentCardId) {
            $("#" + currentCardId).click();
            currentCardId = null;
        }
    });


    function filterTableByClass(classId) {
        var classText = "";
        switch (classId) {
            case "1class": {
                classText = "1кл";
                break;
            }
            case "withoutclass": {
                classText = "б/кл";
                break;
            }
            case "3class": {
                classText = "3кл";
                break;
            }
            case "4class": {
                classText = "4кл";
                break;
            }
            case "5class": {
                classText = "5кл";
                break;
            }
        }

        $(".gn-table__item-wrapper").each(function (index, row) {
            $(row)
                .find(".gn-table__class")
                .each(function (index, clazz) {
                    if ($(clazz).text() !== classText && "" !== classText) {
                        $(row).hide();
                    } else {
                        $(row).show();
                    }
                })
        });
    }

    var filterClass = null;

    $('.gn-filter__item').click(function () {
        filterClass = $(this).data("class");
        filterTableByClass(filterClass);
        $(".gn-filter__item._active").removeClass("_active");
        $(this).addClass("_active");
    });
})(jQuery);