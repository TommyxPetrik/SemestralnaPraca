$("#email-change").validate({
    rules: {
        oldemail: {
            required: true,
            email: true
        },
        newemail: {
            required: true,
            email: true
        },
        password: {
            required: true
        },
    }});