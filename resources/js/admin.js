import axios from 'axios';

export default () => ({
    url: 'http://dentsplysironas.com',
    titles: ['Mã thẻ', 'Ngày kích hoạt', 'Bệnh nhân', 'Ngày sinh', 'Sđt', 'Bác sỹ', 'Nha khoa', 'Labo', 'Loại đĩa', 'SL răng', 'Vị trí răng'],
    fields: ['code', 'is_active', 'patient', 'birthday', 'phone', 'doctor', 'dentistry', 'lab', 'type', 'num_of_teeth', 'locations'],
    customersRoot: [],
    customers: [],
    processing: {},
    searchable: ['code', 'patient', 'doctor', 'dentistry', 'lab', 'type'],
    text: '',
    async init() {
        await axios.get(`${this.url}/adm/customers`)
            .then(response => {
                this.customers = response.data.data;
                this.customersRoot = this.customers;
            })
            .catch(err => {
                console.error(err);
            })
    },

    async store() {
        await axios.post(`${this.url}/adm/customers`, this.processing)
            .then(response => {
                if (response.data) {
                    this.customersRoot.push(response.data);
                    this.customers = this.customersRoot;
                }
            })
            .catch(err => {
                console.error(err);
            })
    },

    async update() {
        await axios.put(`${this.url}/adm/customers/${this.processing.id}`, this.processing)
            .then(response => {
                if (response.data) {
                    let cloneCustomers = [... this.customers ];
                    cloneCustomers[this.processing.index] = this.processing;
                    this.customers = cloneCustomers;
                }
            })
            .catch(err => {
                console.error(err)
            })
    },

    async destroy() {
        await axios.delete(`${this.url}/adm/customers/${this.processing.id}`)
            .then(response => {
                if (response.data) {
                    let cloneCustomers = [... this.customers ];
                    cloneCustomers.splice(this.processing.index, 1);
                    this.customers = cloneCustomers;
                }
            })
            .catch(err => {
                console.log(err)
            })
    },

    select(index, customer) {
        this.processing = { ... customer };
        this.processing.index = index;
    },

    search() {
        let text = this.text.trim();

        if (text.replace(/\s/g, '') === '') {
            this.customers = this.customersRoot;
            return;
        }
        console.log('ok')

        text = text.toUpperCase();

        let cloneCustomers = [... this.customersRoot ];
        this.customers = cloneCustomers.filter(customer => {
            let isOk = false;

            this.searchable.some(key => {
                if (customer[key].indexOf(text) !== -1) {
                    return isOk = true;
                }
            })

            return isOk;
        });
    },
})
