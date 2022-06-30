<script>
    function paramsToJson(url) {
        var params = url.substring(url.indexOf("?"));
        var jsonData = "{";

        if (url.includes("?")) {
            params = params.replace("?", "");
            params = params.split("&");
            for (var i = 0; i < params.length; i++) {
                var d = params[i];
                d = d.split("=");
                jsonData += "\"" + d[0] + "\":\"" + d[1] + "\",";
            }
            jsonData = jsonData.slice(0, -1);
        } else {
            params = "";
        }
        jsonData += "}";
        return jsonData;
    }
</script>
</body>

</html>