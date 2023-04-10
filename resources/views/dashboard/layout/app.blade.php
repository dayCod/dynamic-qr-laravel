<script>
    function unixTimezone(data_json_encode) {
        let data = data_json_encode
        let parse = JSON.parse(data)
        $('table').find('tr > .unix-date').each(function(index, item) {
            return item.innerHTML = moment.unix(parse[index].created_at).format("DD/MM/YYYY HH:mm:ss")
        });
    }
</script>
