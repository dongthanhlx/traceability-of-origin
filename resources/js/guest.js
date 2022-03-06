import axios from "axios";

export default () => ({
    url: 'http://dentsplysironas.com',
    code: '',
    year: '',
    isAccept: false,
    error: '',
    errorForm: '',
    errorNotAccept: '',
    customer: {},
    processing: false,
    validate() {
        this.error = '';
        this.errorForm = '';
        this.errorNotAccept = '';

        if (this.code.length < 4 || this.code.length > 7) {
            this.errorForm = 'Bạn cần nhập mã thẻ có chiều dài từ 4 đến 7 kí tự.'
            return false;
        }

        if (this.year < 1900 || this.year > 2100) {
            this.errorForm = 'Năm sinh bạn nhập không chính xác.'
            return false;
        }

        if (!this.isAccept) {
            this.errorNotAccept = 'Vui lòng đồng ý điều khoản trước khi tra cứu.'
            return false;
        }

        return true;
    },
    async lookup() {
        this.processing = true;

        if (!this.validate()) {
            this.processing = false;
            return;
        }

        await axios.get(`${this.url}/lookup?code=${this.code}&year=${this.year}`)
            .then(response => {
                if (response.data.patient) {
                    this.customer = response.data
                } else {
                    this.error = 'Mã thẻ hoặc năm sinh bạn nhập không chính xác. Vui lòng thử lại.'
                }
            })
            .catch(err => {
                this.error = 'Mã thẻ hoặc năm sinh bạn nhập không chính xác. Vui lòng thử lại.'
                console.error(err);
            })
            .finally(() => {
                this.processing = false;
                this.code = '';
                this.year = '';
            })
    },
})
