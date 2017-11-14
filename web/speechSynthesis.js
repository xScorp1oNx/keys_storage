var BIPspeechSynthesis = function (speechButtonQuery, speechFieldQuery, language) {
    "use strict";
    var synth,mainVoice,speechButton,speechField, sThis = false;
    var selectVoice = function (voices) {
        for(var i = 0; i < voices.length; i++){
            if (voices[i].lang === language) {
                return voices[i];
            }
        }
        return false;
    };
    this.construct = function () {
        speechButton = document.querySelector(speechButtonQuery);
        speechField = document.querySelector(speechFieldQuery);
        if ('speechSynthesis' in window) {
            synth = window.speechSynthesis;
            synth.onvoiceschanged = function (mObj) {
                return function () {
                    mObj.construct2();
                }
            }(this);
        } else {
            speechButton.parentNode.removeChild(speechButton);
        }
    };
    this.construct2 = function () {
        mainVoice = selectVoice(synth.getVoices());
        if (mainVoice !== false) {
            speechButton.addEventListener("click", function (mObj) {
                return function () {
                    mObj.speak();
                };
            }(this));
            window.addEventListener("beforeunload", function(mObj){
                return function () {
                    mObj.speakStop();
                };
            }(this));
        } else {
            speechButton.parentNode.removeChild(speechButton);
        }
    };
    document.addEventListener("DOMContentLoaded", function (mObj){
        return function () {mObj.construct();}
    }(this));
    this.speakStop = function () {
        synth.cancel();
        this.setToUnspeak();
        sThis = false;
    };
    this.speak = function () {
        if (sThis === false) {
            sThis = new SpeechSynthesisUtterance(speechField.innerText);
            sThis.voice = mainVoice;
            sThis.rate = 0.6;
            sThis.onend = function (mObj) {
                return function () {
                    mObj.setToUnspeak();
                };
            }(this);

            synth.speak(sThis);
            this.setToSpeak();
        } else {
            synth.cancel();
            this.setToUnspeak();
            sThis = false;
        }
    };
    this.setToSpeak = function () {
        speechButton.classList.add("speaking");
    };
    this.setToUnspeak = function () {
        speechButton.classList.remove("speaking");
    };
};