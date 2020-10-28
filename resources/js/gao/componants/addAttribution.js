import axios from 'axios';
import _ from 'lodash';

export default {
    props: {
        ordinateur: {
            required: true
        },
        horaire: {
            required: true
        },
        date: {
            required: true
        },
    },
    components: {
    },
    data() {
        return {
            name: '',
            firstname: '',
            ajouter: false,
            client: {},
            dialog: false,

            //
            loading: false,
            search: null,
            clients: [],
        }
    },

    created() {
    },

    watch: {

        search: function (val) {
            if (val && val.length > 1) {

                this.loading = true
                axios.get('/api/clients/search', { params: { query: val } })
                    .then(({ data }) => {
                        this.loading = false;
                        data.data.forEach(client => {
                            this.clients.push(this.formattedClient(client))
                        });

                    });
            }
        },
    },
    methods: {
        init: function () {
            this.name = ''
            this.firstname = ''
            this.ajouter = false
            this.client = {}
        },

        attribuer: function () {

            if (this.isValid()) {
                axios.post('/api/attributions/', this.theClient())
                    .then(({ data }) => {
                        this.$emit('addAttribution', data.data)
                        this.dialog = false
                    })
                    .catch(error => {
                        //TODO catch error
                        console.log(error);
                    });
            }

        },
        theClient: function () {
            return {

                id_ordinateur: this.ordinateur.id,
                date: this.date,
                horaire: this.horaire,
                id_client: _.isNumber(this.client.id) ? this.client.id : '',
                name: this.name,
                firstname: this.firstname

            };
        },
        formattedClient: function (client) {
            return {
                id: client.id,
                name: client.name,
                firstname: client.firstname,
                composed: client.name + " " + client.firstname
            }
        },
        isValid() {
            return !_.isEmpty(this.client) || (!_.isEmpty(this.name) && !_.isEmpty(this.firstname))
        }
    },
    computed: {
        validate() {
            return this.isValid()
        }
    }
}