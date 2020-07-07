export default {
    data() {
        return {};
    },
    methods: {
        $apiUrl(url) {
            return this.$store.state.api_base_url + url;
        }
    }
};