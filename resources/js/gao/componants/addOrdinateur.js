import axios from 'axios';
export default {
    props: {
    },
    components: {
    },
    data() {
        return {
            name: '',
            dialog: false
        }
    },

    computed: {
    },
    created() {
    },

    methods: {
        addOrdinateur: function () {

            if (this.isValid()) {
                const data = {
                    name: this.name,
                };
                axios.post('/api/ordinateurs/', data)
                    .then(({ data }) => {
                        this.$emit('add', data.data)
                        this.dialog = false
                    })
                    .catch(error => {
                        //TODO catch error
                        console.log(error);
                    });
            }

        },
        isValid() {
            return this.name != ''
        }
    },
    computed: {
        validate() {
            return this.isValid()
        }
    }
}