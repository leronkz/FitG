create table if not exists users
(
    "ID_user" serial
        primary key,
    email     varchar(100) not null
        unique,
    password  varchar(100) not null
);

alter table users
    owner to dbuser;

create table if not exists users_data
(
    "ID_user_data" serial
        primary key,
    "ID_user"      integer not null
        constraint users_data_users_id_user_fk
            references users
            on update cascade on delete cascade,
    sex            varchar(100),
    birth_date     date,
    height         real,
    weight         real,
    image          varchar(100),
    name           varchar(100),
    surname        varchar(100)
);

alter table users_data
    owner to dbuser;

create table if not exists sessions
(
    "ID_session" serial
        primary key,
    "ID_user"    integer not null
        constraint sessions_users_id_user_fk
            references users
            on update cascade on delete cascade,
    login_time   timestamp,
    logout_time  timestamp
);

alter table sessions
    owner to dbuser;

create table if not exists roles_info
(
    "ID_role" integer      not null
        primary key,
    role      varchar(100) not null
);

alter table roles_info
    owner to dbuser;

create table if not exists roles
(
    "ID_role" integer not null
        constraint roles_roles_info_id_role_fk
            references roles_info
            on update cascade on delete cascade,
    "ID_user" integer not null
        constraint roles_users_id_user_fk
            references users
            on update cascade on delete cascade
);

alter table roles
    owner to dbuser;

create table if not exists activities
(
    "ID_activity" serial
        primary key,
    "ID_user"     integer not null
        constraint activities_users_id_user_fk
            references users
            on update cascade on delete cascade,
    activity_date date    not null
);

alter table activities
    owner to dbuser;

create table if not exists exercises
(
    "ID_exercise"    serial
        primary key,
    exercise_name    varchar(255) not null,
    number_of_series integer      not null,
    s_weight1        real,
    s_reps1          integer,
    s_weight2        real,
    s_reps2          integer,
    s_weight3        real,
    s_reps3          integer,
    s_weight4        real,
    s_reps4          integer,
    s_weight5        real,
    s_reps5          integer,
    s_weight6        real,
    s_reps6          integer,
    "ID_activity"    integer      not null
        constraint exercises_activities_id_activity_fk
            references activities
            on update cascade on delete cascade
);

alter table exercises
    owner to dbuser;


create or replace function uuid_nil() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_nil() owner to dbuser;

create or replace function uuid_ns_dns() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_dns() owner to dbuser;

create or replace function uuid_ns_url() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_url() owner to dbuser;

create or replace function uuid_ns_oid() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_oid() owner to dbuser;

create or replace function uuid_ns_x500() returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_ns_x500() owner to dbuser;

create or replace function uuid_generate_v1() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v1() owner to dbuser;

create or replace function uuid_generate_v1mc() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v1mc() owner to dbuser;

create or replace function uuid_generate_v3(namespace uuid, name text) returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v3(uuid, text) owner to dbuser;

create or replace function uuid_generate_v4() returns uuid
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v4() owner to dbuser;

create or replace function uuid_generate_v5(namespace uuid, name text) returns uuid
    immutable
    strict
    parallel safe
    language c
as
$$
begin
-- missing source code
end;
$$;

alter function uuid_generate_v5(uuid, text) owner to dbuser;

create or replace function lower_email() returns trigger
    language plpgsql
as
$$BEGIN
    NEW.email = lower(NEW.email);
    RETURN NEW;
END$$;

alter function lower_email() owner to dbuser;

create trigger lower_email
    before insert
    on users
    for each row
execute procedure lower_email();

create or replace function assign_role() returns trigger
    language plpgsql
as
$$BEGIN
        INSERT INTO roles("ID_role","ID_user") VALUES(1,NEW."ID_user");
    RETURN NEW;
END$$;

alter function assign_role() owner to dbuser;

create trigger assign_role
    after insert
    on users
    for each row
execute procedure assign_role();


INSERT INTO public.users ("ID_user", email, password) VALUES (17, 'm.owsiak12@gmail.com', '$2y$10$LQeqiPDpKTZTqJogwIxEGOA6jPeDh5Y2BV/Yzq4yl7VNlCjj4qfzK');
INSERT INTO public.users ("ID_user", email, password) VALUES (36, 'kinieb9@gmail.com', '$2y$10$2xtPVQpNW6EQzeWtB/XrAe0wAnx87lNoLkKFMc08z2w4pvsAd09b6');
INSERT INTO public.users ("ID_user", email, password) VALUES (37, 'mikolajpe2@gmail.com', '$2y$10$00S7j9Xna.WvBDn20gmFfeTKHQ.jEcvUgbQ/eP4ORJM9QIWQZN7SS');

INSERT INTO public.users_data ("ID_user_data", "ID_user", sex, birth_date, height, weight, image, name, surname) VALUES (43, 36, 'FEMALE', '2001-02-15', 160, 55, 'pobrane.jpg', 'Kinga', 'Niebieszczanska');
INSERT INTO public.users_data ("ID_user_data", "ID_user", sex, birth_date, height, weight, image, name, surname) VALUES (44, 37, null, null, null, null, 'profile_picture.svg', null, null);
INSERT INTO public.users_data ("ID_user_data", "ID_user", sex, birth_date, height, weight, image, name, surname) VALUES (25, 17, 'MALE', '2001-07-31', 174, 76, 'IMG_1022.JPG', 'Mateusz', 'Owsiak');

INSERT INTO public.sessions ("ID_session", "ID_user", login_time, logout_time) VALUES (108, 17, '2023-01-21 15:27:52.000000', '2023-01-21 15:27:55.000000');

INSERT INTO public.roles_info ("ID_role", role) VALUES (1, 'user');
INSERT INTO public.roles_info ("ID_role", role) VALUES (2, 'admin');

INSERT INTO public.roles ("ID_role", "ID_user") VALUES (2, 17);
INSERT INTO public.roles ("ID_role", "ID_user") VALUES (1, 36);
INSERT INTO public.roles ("ID_role", "ID_user") VALUES (1, 37);
