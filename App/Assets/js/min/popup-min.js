!function(){function e(e){for(var a=!1,s=e.target;s!=document.body;s=s.parentNode)if("messages"==s.className||"notifications"==s.className||"search search-primary"==s.className||"search search-secondary"==s.className||"footer"==s.className){a=!0;break}if(!a){var t=document.querySelector(".show");t.className="popup"}}function a(e){t=!0;var a=e.target.nextElementSibling;a.classList.toggle("show")}for(var s=document.querySelectorAll(".popup-button"),t=!1,c=0,o;o=s[c++];)o.addEventListener("click",a,!1);t&&document.addEventListener("click",e,!1)}();