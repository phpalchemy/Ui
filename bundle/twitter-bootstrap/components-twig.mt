/*****************************************************************************
 *                     HTML Components generator script
 *****************************************************************************/

// Setting as default block to: '_default'
@def global version 1.0

// Setting as default block to: '_default'
@def setconf default_block _default


/**  Widgets Blocks **/


///
/// TEXTBOX Widget
///
@block textbox

    @var html <<<
    <div class="controls">
      <input type="text" tal:attributes="id id; value value; @@attributes" />
    </div>
    >>>

    @var javascript alert('{id}');

@end

///
/// SELECT Widget
///
@block select

    @var html <<<
    <div class="controls">
      <select tal:attributes="id id; @@attributes1">
        <option tal:attributes="name item/value" tal:content="item/label" tal:repeat="item items"></option>
      </select>
    </div>
    >>>

    @var javascript <<<
      <tal:block tal:condition="true: value">
        {% if value_raw != '' %}$('{id}').val('{value}');{% endif %}
      </tal:block>

      <tal:block tal:condition="not: value">
        // this field with ${id} has not value
      </tal:block>
    >>>

@end

/*
 * Default block
 */
@block _default

@var html <<<
<div class="controls">
  <input
    type="{{ xtype }}"
    id="{{ id }}"
    value="{{ value }}"
    class="input-xlarge"
    {% for at_name, at_value in attributes %}
      {{ at_name }}="{{ at_value }}"
    {% endfor %}
  />
</div>
>>>

@end









