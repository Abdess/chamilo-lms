<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>{{ 'Certificate' | get_lang }}</title>
</head>
<body style="margin: 0; padding: 0;">
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
                <img src="{{ _p.web_css_theme }}images/block.png"/>
            </td>
        </tr>
        <tr>
            <td>
                <table border="0" cellpadding="0" cellspacing="0">
                    <tr>
                        <td><img src="{{ _p.web_css_theme }}images/block.png"/></td>
                        <td bgcolor="#92c647">
                            <table border="0" cellpadding="0" cellspacing="0" align="center" width="100%">
                                <tr>
                                    <td bgcolor="#92c647"><img src="{{ _p.web_css_theme }}images/header_top.png" style="display: block;"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                            <tr>
                                                <td bgcolor="#92c647" width=58 height=91>
                                                    <img src="{{ _p.web_css_theme }}images/lado-b.png" style="display:block;">
                                                </td>
                                                <td bgcolor="#92c647" width=700 height=91 style="padding-left: 20px; padding-right: 20px; font-family:CourierSans-Light; font-weight: bold; line-height: 47px; color:#FFF; padding-bottom: 10px; font-size: 45px;">
                                                    {{ 'CertificateHeader' | get_lang }}
                                                </td>
                                                <td bgcolor="#92c647" width=58 height=91>
                                                    <img src="{{ _p.web_css_theme }}images/lado-header.png" style="display:block;">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" width="100%" height=900>
                                            <tr>
                                                <td bgcolor="#92c647" height=800><img src="{{ _p.web_css_theme }}images/lado-a.png" style="display:block;"></td>
                                                <td height=800 style="font-family:CourierSans-Light; line-height: 22px; color:#40ad49; padding: 20px; font-size: 18px;" valign="top">
                                                    <h3 style="color: #672290; font-size: 24px;">
                                                        {{ complete_name }}
                                                    </h3>
                                                    <p style="font-size: 16px;">
                                                        {% if document_language == 'fr' %}
                                                            {{ 'UserHasParticipateDansDePlatformeXTheContratDateXCertificateDateXTimeX' | get_lang | format(_s.site_name, terms_validation_date_no_time, certificate_generated_date_no_time)}}
                                                        {% else %}
                                                            {{ 'UserHasParticipateDansDePlatformeXTheContratDateXCertificateDateXTimeX' | get_lang | format(terms_validation_date_no_time, certificate_generated_date_no_time, _s.site_name)}}
                                                        {% endif %}
                                                    </p>
                                                    <br />
                                                    <p style="font-size: 16px;">{{ 'ThisTrainingHasXHours' | get_lang | format(time_in_platform_in_hours)}}</p><br />
                                                    <p style="font-size: 16px;">{{ 'TheContentsAreValidated' | get_lang }}:</p>
                                                        {% if sessions %}
                                                            <ul style="color: #672290; font-size: 16px;">
                                                                {% for session in sessions %}
                                                                    <li>  {{ session.session_name }}</li>
                                                                {% endfor %}
                                                            </ul>
                                                        {% endif %}<br />
                                                    <h4 style="color: #672290; font-size: 16px;">{{ complete_name }}</h4>
                                                    <p style="color:#40ad49; font-size: 16px;">{{ 'SkillsValidated' | get_lang }}:</p>
                                                        {% if skills %}
                                                            <ul style="color: #672290; font-size: 16px;">
                                                            {% for skill in skills %}
                                                                <li>{{ skill.name }}</li>
                                                            {% endfor %}
                                                            </ul>
                                                        {% endif %}
                                                        <br />
                                                    <p style="color:#40ad49; font-size: 16px;">Berlin/Paris, {{ 'The' | get_lang }} <span style="font-weight: bold; color: #672290;">{{ certificate_generated_date_no_time }}</span><br />
                                                        {{ 'ThePlatformTeam' | get_lang }}</p>
                                                    <br />
                                                </td>
                                                <td height=800 bgcolor="#92c647">
                                                    <img src="{{ _p.web_css_theme }}images/lado-b.png" style="display:block;">
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table border="0" cellspacing="0" cellpadding="0" width="100%" height=91>
                                            <tr>
                                                <td bgcolor="#92c647" width=58 height=91><img src="{{ _p.web_css_theme }}images/lado-b.png"  style="display:block;"></td>
                                                <td bgcolor="#92c647" width=500 height=91 style="padding-left: 20px; padding-right: 20px; font-family:CourierSans-Light; line-height: 18px; color:#FFF;">
                                                    {{ 'CertificateFooter' | get_lang }}
                                                </td>
                                                <td bgcolor="#92c647" width=245 height=91><img src="{{ _p.web_css_theme }}images/lado-footer.png" style="display:block;"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td><img src="{{ _p.web_css_theme }}images/block.png"/></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <img src="{{ _p.web_css_theme }}images/block.png"/>
            </td>
        </tr>
    </table>
</body>
</html>

