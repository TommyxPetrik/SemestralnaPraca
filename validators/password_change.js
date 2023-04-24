$("#password-change").validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        oldpassword: {
            required: true
        },
        newpassword: {
            required: true
        },
        rpassword: {
            required: true,
            equalTo: "#newpassword"
    }
}});