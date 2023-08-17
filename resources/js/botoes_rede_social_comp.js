document.addEventListener("DOMContentLoaded", function() {
    //altera a URL do botão
    document.getElementById("facebook-share-btt").href = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(window.location.href);

    //conteúdo que será compartilhado: Título da página + URL
    var conteudo = encodeURIComponent(document.title + " " + window.location.href);

    //altera a URL do botão
    document.getElementById("whatsapp-share-btt").href = "https://api.whatsapp.com/send?text=" + conteudo;

    //Constrói a URL depois que o DOM estiver pronto
    var url = window.location.href; //url
    var title = encodeURIComponent(document.title); //título
    var mailToLink = "mailto:?subject="+title;

    //tenta obter o conteúdo da meta tag description
    var desc = document.querySelector("meta[name='description']");
    desc = (!!desc)? desc.getAttribute("content") : null;

    //se a meta tag description estiver ausente...
    if(!desc){
        //...tenta obter o conteúdo da meta tag og:description
        desc = document.querySelector("meta[property='og:description']");
        desc = (!!desc)? desc.getAttribute("content") : null;
    }
    //Se houver descrição, combina a descrição com a url

    //senão o corpo da mensagem terá apenas a url
    var body = (!!desc)? desc + " " + url : url;

    //altera o link do botão
    mailToLink = mailToLink + "&body=" + encodeURIComponent(body);
    document.getElementById("mail-share-btt").href = mailToLink;

    //Constrói a URL depois que o DOM estiver pronto
    var url = encodeURIComponent(window.location.href); //url
    var title = encodeURIComponent(document.title); //título

    var telegramLink = "https://telegram.me/share/url?url=" + url + "&text=" + title;
    document.getElementById("telegram-share-btt").href = telegramLink;

    //var linkedinLink = "https://www.linkedin.com/shareArticle?mini=true&url="+url+"&title="+titulo;

    //tenta obter o conteúdo da meta tag description
    var summary = document.querySelector("meta[name='description']");
    summary = (!!summary)? summary.getAttribute("content") : null;

    //se a meta tag description estiver ausente...
    if(!summary){
        //...tenta obter o conteúdo da meta tag og:description
        summary = document.querySelector("meta[property='og:description']");
        summary = (!!summary)? summary.getAttribute("content") : null;
    }
    //altera o link do botão
    //linkedinLink = (!!summary)? linkedinLink + "&summary=" + encodeURIComponent(summary) : linkedinLink;
    //document.getElementById("linkedin-share-btt").href = linkedinLink;

}, false);
