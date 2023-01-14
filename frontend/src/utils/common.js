export const setUserSession = (role, users) => {
    localStorage.setItem('role', role);
    localStorage.setItem('user', JSON.stringify(users));
}

export function authHeader() {
    // return authorization header with jwt token
    let role = localStorage.getItem('role');
    let user = localStorage.getItem('user');

    if (role && user) {
        const status = {
            'status' : 'login',
            'statusCode' : 200,
            'role': role
        }
        return status
    } else {
        const status = {
            'status' : 'notLogin',
            'statusCode' : 400,
            'role': 'not_role'
        }
        return status;
    }
}