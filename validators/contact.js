$("#contactform").validate({
    rules: {
        name: {
            required: true
        },
        email: {
            required: true,
            email: true
        },
        subject: {
            required: true
        },
        msg: {
            required: true
        }
    }});