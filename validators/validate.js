$("#formular").validate({
    rules: {
        name: {
            required: true,
            minLength: 5
        },
        email: {
            required: true,
            email: true
        },
        password: {
            required: true
        },
        rpassword: {
            required: true,
            equalTo: "#password"
        },
        country: {
            required: true
        }
    }
});