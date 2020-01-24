export default {
    data() {
        return {};
    },
    methods: {
        $apiUrl(url) {
            return this.$store.state.base_url + url;
        }
    }
};