/**
 * selectImages
 * menuleft
 * tabs
 * progresslevel
 * collapse_menu
 * fullcheckbox
 * showpass
 * gallery
 * coppy
 * select_colors_theme
 * icon_function
 * box_search
 * preloader
 */

(function ($) {
    "use strict";

    var selectImages = function () {
        if ($(".image-select").length > 0) {
            const selectIMG = $(".image-select");
            selectIMG.find("option").each((idx, elem) => {
                const selectOption = $(elem);
                const imgURL = selectOption.attr("data-thumbnail");
                if (imgURL) {
                    selectOption.attr(
                        "data-content",
                        "<img src='%i'/> %s"
                            .replace(/%i/, imgURL)
                            .replace(/%s/, selectOption.text())
                    );
                }
            });
            selectIMG.selectpicker();
        }
    };

    var menuleft = function () {
        if ($("div").hasClass("section-menu-left")) {
            var bt = $(".section-menu-left").find(".has-children");
            bt.on("click", function () {
                var args = { duration: 200 };
                if ($(this).hasClass("active")) {
                    $(this).children(".sub-menu").slideUp(args);
                    $(this).removeClass("active");
                } else {
                    $(".sub-menu").slideUp(args);
                    $(this).children(".sub-menu").slideDown(args);
                    $(".menu-item.has-children").removeClass("active");
                    $(this).addClass("active");
                }
            });
            $(".sub-menu-item").on("click", function (event) {
                event.stopPropagation();
            });
        }
    };

    var tabs = function () {
        $(".widget-tabs").each(function () {
            $(this).find(".widget-content-tab").children().hide();
            $(this).find(".widget-content-tab").children(".active").show();
            $(this)
                .find(".widget-menu-tab")
                .find("li")
                .on("click", function () {
                    var liActive = $(this).index();
                    var contentActive = $(this)
                        .siblings()
                        .removeClass("active")
                        .parents(".widget-tabs")
                        .find(".widget-content-tab")
                        .children()
                        .eq(liActive);
                    contentActive.addClass("active").fadeIn("slow");
                    contentActive.siblings().removeClass("active");
                    $(this)
                        .addClass("active")
                        .parents(".widget-tabs")
                        .find(".widget-content-tab")
                        .children()
                        .eq(liActive)
                        .siblings()
                        .hide();
                });
        });
    };

    $("ul.dropdown-menu.has-content").on("click", function (event) {
        event.stopPropagation();
    });
    $(".button-close-dropdown").on("click", function () {
        $(this)
            .closest(".dropdown")
            .find(".dropdown-toggle")
            .removeClass("show");
        $(this).closest(".dropdown").find(".dropdown-menu").removeClass("show");
    });

    var progresslevel = function () {
        if ($("div").hasClass("progress-level-bar")) {
            var bars = document.querySelectorAll(".progress-level-bar > span");
            setInterval(function () {
                bars.forEach(function (bar) {
                    var t1 = parseFloat(bar.dataset.progress);
                    var t2 = parseFloat(bar.dataset.max);
                    var getWidth = (t1 / t2) * 100;
                    bar.style.width = getWidth + "%";
                });
            }, 500);
        }
    };

    var collapse_menu = function () {
        $(".button-show-hide").on("click", function () {
            $(".layout-wrap").toggleClass("full-width");
        });
    };

    var fullcheckbox = function () {
        $(".total-checkbox").on("click", function () {
            if ($(this).is(":checked")) {
                $(this)
                    .closest(".wrap-checkbox")
                    .find(".checkbox-item")
                    .prop("checked", true);
            } else {
                $(this)
                    .closest(".wrap-checkbox")
                    .find(".checkbox-item")
                    .prop("checked", false);
            }
        });
    };

    var showpass = function () {
        $(".show-pass").on("click", function () {
            $(this).toggleClass("active");
            var input = $(this).parents(".password").find(".password-input");

            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else if (input.attr("type") === "text") {
                input.attr("type", "password");
            }
        });
    };

    var gallery = function () {
        $(".button-list-style").on("click", function () {
            $(".wrap-gallery-item").addClass("list");
        });
        $(".button-grid-style").on("click", function () {
            $(".wrap-gallery-item").removeClass("list");
        });
    };

    var coppy = function () {
        $(".button-coppy").on("click", function () {
            myFunction();
        });
        function myFunction() {
            var copyText = document.getElementsByClassName("coppy-content");
            navigator.clipboard.writeText(copyText.text);
        }
    };

    var select_colors_theme = function () {
        if ($("div").hasClass("select-colors-theme")) {
            $(".select-colors-theme .item").on("click", function (e) {
                $(this)
                    .parents(".select-colors-theme")
                    .find(".active")
                    .removeClass("active");
                $(this).toggleClass("active");
            });
        }
    };

    var icon_function = function () {
        if ($("div").hasClass("list-icon-function")) {
            $(".list-icon-function .trash").on("click", function (e) {
                $(this).parents(".product-item").remove();
                $(this).parents(".attribute-item").remove();
                $(this).parents(".countries-item").remove();
                $(this).parents(".user-item").remove();
                $(this).parents(".roles-item").remove();
            });
        }
    };

    var box_search = function () {
        $(document).on("click", function (e) {
            var clickID = e.target.id;
            if (clickID !== "s") {
                $(".box-content-search").removeClass("active");
            }
        });
        $(document).on("click", function (e) {
            var clickID = e.target.class;
            if (clickID !== "a111") {
                $(".show-search").removeClass("active");
            }
        });

        $(".show-search").on("click", function (event) {
            event.stopPropagation();
        });
        $(".search-form").on("click", function (event) {
            event.stopPropagation();
        });
        var input = $(".header-dashboard").find(".form-search").find("input");
        input.on("input", function () {
            if ($(this).val().trim() !== "") {
                $(".box-content-search").addClass("active");
            } else {
                $(".box-content-search").removeClass("active");
            }
        });
    };

    //   var retinaLogos = function() {
    //     var retina = window.devicePixelRatio > 1 ? true : false;
    //       if(retina) {
    //         if ($(".dark-theme").length > 0) {
    //           $('#logo_header').attr({src:'images/logo/logo.png',width:'154px',height:'52px'});
    //         } else {
    //           $('#logo_header').attr({src:'images/logo/logo.png',width:'154px',height:'52px'});
    //         }
    //       }
    //   };

    var preloader = function () {
        setTimeout(function () {
            $("#preload").fadeOut("slow", function () {
                $(this).remove();
            });
        }, 1000);
    };

    // Dom Ready
    $(function () {
        selectImages();
        menuleft();
        tabs();
        progresslevel();
        collapse_menu();
        fullcheckbox();
        showpass();
        gallery();
        coppy();
        select_colors_theme();
        icon_function();
        box_search();
        retinaLogos();
        preloader();
    });
})(jQuery);

function suiHandle(e, id) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (ev) => {
        document.getElementById("sui-img-" + id).src = ev.target.result;
        document.getElementById("sui-fname-" + id).textContent = file.name;
        document.getElementById("sui-fsize-" + id).textContent = fmtSize(
            file.size
        );
        document.getElementById("sui-ph-" + id).style.display = "none";
        document.getElementById("sui-pv-" + id).style.display = "block";
        const wrap = document.getElementById("sui-" + id);
        wrap.classList.add("locked");
        wrap.onclick = null;
    };
    reader.readAsDataURL(file);
}

function suiRemove(e, id) {
    e.stopPropagation();
    document.getElementById("inp-" + id).value = "";
    document.getElementById("sui-img-" + id).src = "";
    document.getElementById("sui-ph-" + id).style.display = "flex";
    document.getElementById("sui-pv-" + id).style.display = "none";
    const wrap = document.getElementById("sui-" + id);
    wrap.classList.remove("locked");
    wrap.onclick = () => document.getElementById("inp-" + id).click();
}

/* =============================
   GALLERY
   ============================= */
const _guiFiles = {};

function guiHandle(e, id) {
    if (!_guiFiles[id]) _guiFiles[id] = [];
    Array.from(e.target.files).forEach((file) => {
        // skip duplicates by name
        if (_guiFiles[id].find((f) => f.name === file.name)) return;
        _guiFiles[id].push(file);
        _guiRender(file, id);
    });
    _guiSync(id);
    _guiSyncInput(id);
}

function _guiRender(file, id) {
    const reader = new FileReader();
    reader.onload = (ev) => {
        const grid = document.getElementById("gui-grid-" + id);
        const item = document.createElement("div");
        item.className = "gui-item";
        item.dataset.fname = file.name;
        const safeName = file.name.replace(/'/g, "\\'");
        item.innerHTML = `
            <img src="${ev.target.result}" alt="${file.name}">
            <button type="button" class="gui-rm"
                    onclick="guiRemove(this,'${id}','${safeName}')"
                    title="Remove">
<svg width="10" height="10" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M1 1L13 13M13 1L1 13" stroke="#ffffff" stroke-width="2" stroke-linecap="round"/>
</svg>
            </button>`;
        const addBtn = grid.querySelector(".gui-add-btn");
        addBtn ? grid.insertBefore(item, addBtn) : grid.appendChild(item);
    };
    reader.readAsDataURL(file);
}

function _guiEnsureAddBtn(id) {
    const grid = document.getElementById("gui-grid-" + id);
    if (grid.querySelector(".gui-add-btn")) return;
    const btn = document.createElement("div");
    btn.className = "gui-add-btn";
    btn.title = "إضافة المزيد";
    btn.onclick = () => document.getElementById("inp-" + id).click();
    btn.innerHTML = `
        <svg width="22" height="22" fill="none" stroke="currentColor"
             stroke-width="1.8" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="9"/>
            <line x1="12" y1="8" x2="12" y2="16"/>
            <line x1="8" y1="12" x2="16" y2="12"/>
        </svg>
        Add`;
    grid.appendChild(btn);
}

function guiRemove(btn, id, fname) {
    _guiFiles[id] = (_guiFiles[id] || []).filter((f) => f.name !== fname);
    btn.closest(".gui-item").remove();
    _guiSync(id);
    _guiSyncInput(id);
}

function _guiSyncInput(id) {
    const input = document.getElementById("inp-" + id);
    const dt = new DataTransfer();
    (_guiFiles[id] || []).forEach((file) => dt.items.add(file));
    input.files = dt.files;
}

function _guiSync(id) {
    const grid = document.getElementById("gui-grid-" + id);
    const dz = document.getElementById("gui-dz-" + id);
    const newCount = (_guiFiles[id] || []).length;
    const oldItems = grid.querySelectorAll(".gui-item[data-old-id]").length;
    const total = newCount + oldItems;

    if (total > 0) {
        _guiEnsureAddBtn(id);
        grid.style.display = "grid";
        dz.style.display = "none";
    } else {
        grid.querySelector(".gui-add-btn")?.remove();
        grid.style.display = "none";
        dz.style.display = "flex";
    }
}
function guiRemoveOld(btn, id, imgId) {
    btn.closest(".gui-item").remove();

    const keptInput = document.getElementById("kept-" + id);
    const kept = keptInput.value.split(",").filter((v) => v && v != imgId);
    keptInput.value = kept.join(",");

    _guiSync(id);
}

/* Shared */
function fmtSize(b) {
    if (b < 1024) return b + " B";
    if (b < 1048576) return (b / 1024).toFixed(1) + " KB";
    return (b / 1048576).toFixed(1) + " MB";
}

document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".preview-card").forEach(function (card) {
        const img = card.querySelector("img");

        if (
            img &&
            img.getAttribute("src") &&
            img.getAttribute("src").trim() !== ""
        ) {
            card.style.display = "flex";

            const id = img.id.replace("previewImg-", "");
            const input = document.getElementById(id);

            if (input) {
                const uploadBox = input.closest(".item");
                uploadBox.style.display = "none";
            }
        }
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".gui-wrap").forEach((wrap) => {
        const id = wrap.id.replace("gui-", "");
        _guiSync(id);
    });
});
